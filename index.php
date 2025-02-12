<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crue USER</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
   <main>
    <section class="w-full h-screen  bg-gray-300 flex justify-center items-center flex-col">
      <?php
             if(isset($_GET['msg'])){
              $msg = $_GET['msg'];
              echo '<div class="fixed bottom-5 left-4 px-4 py-3 bg-gray-700 rounded-sm d-flex items-center justify-center  transition-transform opacity-100  duration-300" id="toast">
      <p class="text-white text-center">'.$msg.'</p>
      </div>';
             }
          ?>
      <div class="mx-auto p-4  ">
        <h1 class="text-3xl font-bold text-center">CRUD USER</h1>
   
        <div class="flex justify-center items-center flex-col mt-4 bg-gray-300"></div>
        <!--modal qui vas contenir le formulaire d ajout utilisateur-->
        <div id="modalAddUser" class="fixed inset-0 flex items-center justify-center bg-gray-400 bg-opacity-50 opacity-0 invisible transition-opacity duration-300">
          <div id="modalAddUser-content" class="bg-gray-200 p-6 rounded-lg w-96 shadow-lg transition-transform scale-95 duration-300 opacity-0 invisible ">
            <div class="p-1">
              <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold ">Add User</h2>
              <i class='bx bx-x float-right cursor-pointer text-2xl' id="close-modal"></i>
              </div>
              
              <form action="assets/add.php" method="post" class="mt-4">
                <div class="mb-4">
                  <label for="name" class="block text-gray-700 font-bold mb-2">Nom</label>
                  <input type="text" name="nom" id="name" class="border focus:border-gray-700 border-gray-500 p-2 outline-none rounded-md w-full" placeholder="Nom">
                </div>
                <div class="mb-4">
                  <label for="prenom" class="block text-gray-700 font-bold mb-2">Prenom</label>
                  <input type="text" name="prenom" id="prenom" class="border focus:border-gray-700 border-gray-500 p-2 outline-none rounded-md w-full" placeholder="Prenom">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="border focus:border-gray-700 border-gray-500 p-2 outline-none rounded-md w-full" placeholder="Email">
                  </div>
                  <div class="mb-4">
                    <label for="genre" class="block text-gray-700 font-bold mb-2">Email</label>
                   <select name="genre" id="genre" class="border focus:border-gray-700 border-gray-500 p-2 outline-none rounded-md w-full" placeholder="Email">
                    <option selected>----selectionnez le genre</option>
                    <option value="homme">Home</option>
                    <option value="femme">Femme</option>
                   </select>
                  </div>
                </div>
                <div class="mb-4">
                  <label for="email" class="block text-gray-700 font-bold mb-2">Password</label>
                  <input type="password" name="password" id="password" class="border focus:border-gray-700 border-gray-500 p-2 outline-none rounded-md w-full" placeholder="password">
                </div>
                <div class="flex gap-4 ">
                  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add User</button>
                  <button type="reset" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                </div>
              </form>

            </div>
          </div>

        </div>
            
          <div class="overflow-auto border border-gray-500 mt-9 rounded ">
            <div class="p-4 border-b border-gray-500 block  flex flex-col"> 
                <button class="bg-blue-500 mb-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded " id="modal-btn">
                <a  >Add user</a>
                <i class='bx bxs-user-circle'></i>
                  </button>
               <input type="text" class="border focus:border-gray-700 border-gray-500 p-2 outline-none rounded-md" placeholder="Search user">
            </div>
            <!--tableau qui vas contenir les utilisateurs qui sont dans la base de données-->
            <?php
              require_once "assets/database.php";

              $sql = "SELECT * FROM user_tb";
              $resultat = $conn->query($sql);
              if($resultat->num_rows >0){
                echo '<table class="min-w-full   rounded-md">
                <thead>
                  <tr class="border-b border-t border-gray-500 bg-gray-500">
                    <th class="  px-4 py-2 ">ID</th>
                    <th class=" px-4 py-2">Nom</th>
                    <th class=" px-4 py-2">Prenom</th>
                    <th class=" px-4 py-2">genre</th>
                     <th class=" px-4 py-2">Email</th>
                    <th class=" px-4 py-2"></th>
                  </tr>
                </thead>
                 <tbody>';
                while($row = $resultat->fetch_assoc()){
               
                 echo ' <tr class="border-b border-gray-500">
                  <td class=" px-4 py-2">'.$row['id_user'].'</td>
                  <td class=" px-4 py-2">'.$row['nom'].'</td>
                  <td class=" px-4 py-2">'.$row['prenom'].'</td>
                  <td class=" px-4 py-2">'.$row['genre'].'</td>
                  <td class=" px-4 py-2">'.$row['email'].'</td>
                  <td class=" px-4 py-2">
                    <i class="bx bx-dots-vertical-rounded float-end cursor-pointer size-2"></i>
                    <div class="menu flex flex-col absolute w-30 p-4 hidden opacity-0 transition-opacity duration-300   bg-gray-600 text-white rounded-md" id="menu">
                      <a href="show.php?<?php '.$row['id_user'].'?>" class="  text-white  text-sm cursor-pointer hover:scale-105 "><i class="bx bxs-low-vision"></i>Show</a>
                      <a href="edit.php?<?php '.$row['id_user'].'?>" class=" text-white  text-sm hover:scale-105"><i class="bx bxs-edit text-lime-400"></i>Edit</a>
                      <a href="delete.php?<?php '.$row['id_user'].'?>" class=" text-white   text-sm hover:scale-105"><i class="bx bxs-trash text-red-600" ></i>Delete</a>
                    </div>
                    

                </tr>';
             ;
                }
              echo '</tbody>
                    </table>';



              }
            ?>

            
          </div>

        </div>
       
      </div>

    </section>
   </main>

   <script src="assets/js/script.js"></script>
  </body>
</html>