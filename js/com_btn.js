var $btn = document.getElementsByClassName('btn')[0];
var $title = document.getElementsByClassName('title')[0];
$btn.addEventListener('click', function(event) {
    if(!document.getElementsByClassName('amount')[0]){
        $btn.style.visibility = "hidden";
        var $form = document.createElement('form');
        $form.action = "actions/comment.php";
        $form.method = "post";
        // $form.style.display = 'flex';

        var $btn_block = document.createElement('div');
        $btn_block.classList.add('btn_block');
        $btn_block.style.display = 'flex';


        var $input = document.createElement('input');
        $input.type = 'text';
        $input.name = "text";
        $input.placeholder = 'Ваш комментарий';
        $input.classList.add('amount');
        // $input.style.display = 'block';

        var $com_btn = document.createElement('button');
        $com_btn.classList.add('com_btn');
        $com_btn.innerHTML = "Отправить";

        var $cancell_btn = document.createElement('button');
        $cancell_btn.classList.add('cancell_btn');
        $cancell_btn.innerHTML = "Отмена";
        $cancell_btn.formAction = "";
        $cancell_btn.addEventListener('click', function(event){
            $btn.style.visibility = "visible";
            $form.remove();
        });

        $title.after($form);
        $form.append($input);
        $form.append($btn_block);
        $btn_block.append($com_btn);
        // $input.after($com_btn);
        $com_btn.after($cancell_btn);
    } else if(document.getElementsByClassName('amount') != "") {
        var com = document.getElementsByClassName('amount')[0].value;
        // fetch('../actions/comment.php', {
        //     method: 'POST', 
        //     body: "text=" + com
        // });
    }
  });
