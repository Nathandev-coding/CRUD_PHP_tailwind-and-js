const menus = document.querySelectorAll('.menu');
const dots = document.querySelector('.bx-dots-vertical-rounded');
dots.addEventListener('click',()=>{
menus.forEach(menu=>{
menu.classList.toggle('hidden');
  menu.classList.toggle('opacity-100');
};
  
})

//ouvrire le modal
const modalBtn = document.getElementById('modal-btn');
const modal = document.getElementById('modalAddUser');
const modalContent = document.getElementById('modalAddUser-content');
const closeModal = document.getElementById('close-modal');
modalBtn.addEventListener('click',()=>{
  modal.classList.toggle('opacity-100');
  modal.classList.toggle('invisible');
  modalContent.classList.toggle('opacity-100');
  modalContent.classList.toggle('invisible');
  modalContent.classList.toggle('scale-100');
});
closeModal.addEventListener('click',()=>{
  modal.classList.toggle('opacity-100');
  modal.classList.toggle('invisible');
  modalContent.classList.toggle('opacity-100');
  modalContent.classList.toggle('invisible');
  modalContent.classList.toggle('scale-100');
});

//cache le toat apres 300ms
const toast = document.getElementById('toast');
setTimeout(()=>{
  toast.classList.add('opacity-100','tranform-x-0');
  toast.classList.remove('opacity-100');
    toast.classList.add('opacity-0');
  
},3000);

//si on click en dehors du menu on le cache
document.addEventListener('click',(e)=>{
  if(e.target !== dots){
    menu.classList.add('hidden','opacity-0');
    menu.classList.remove('opacity-100');
  }else if(e.target !== modal){
    modal.classList.add('opacity-0','invisible');
    modalContent.classList.add('opacity-0','invisible');
    modalContent.classList.remove('opacity-100');
    modalContent.classList.remove('invisible');
  }

})