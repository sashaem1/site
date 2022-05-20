var $addBtn = document.getElementsByClassName('add_btn')[0];
var $canBtn1 = document.getElementById('can_btn1')[0];
var $addForm = document.getElementsByClassName('add_container')[0];

$addBtn.addEventListener('click', function(event){
    $addForm.style.visibility = "visible";
        
});

$canBtn1.addEventListener('click', function(event){
    $addForm.style.visibility = "hidden";
        
}); 

