var $addImg = document.getElementsByClassName('add_img')[0];
var $addtxt = document.getElementsByClassName('add_txt')[0];

var $addBtns = document.getElementsByClassName('add_btns')[0];
$addtxt.style.visibility = "hidden";
$addImg.style.visibility = "hidden";

var $countImg = 0;
var $countTxt = 0;

var main_info = 0;

$addImg.addEventListener('click', function(event){
    var $input = document.createElement('input');
        $input.type = 'file';
        $input.name = "img" + $countImg;
        $input.classList.add('info_imput');
        

    $countImg++;

    $addBtns.before($input);
        
});

$addtxt.addEventListener('click', function(event){
    var $input = document.createElement('input');
        $input.type = 'text';
        $input.name = "img" + $countTxt;
        $input.classList.add('info_imput');

    $countTxt++;

    $addBtns.before($input);
        
});

function add_info_btn() {
    if (main_info == 2) {
        $addBtns.style.visibility = "visible";
    }
}