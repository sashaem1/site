var $btn = document.getElementsByClassName('btn')[0];
var $title = document.getElementsByClassName('title')[0];
$btn.addEventListener('click', function(event) {
    if(!document.getElementsByClassName('amount')[0]){
        var $input = document.createElement('input');
        $input.type = 'text';
        $input.placeholder = 'Ваш комментарий';
        $input.classList.add('amount');
        $title.after($input);
    } else if(document.getElementsByClassName('amount') != "") {
        var com = document.getElementsByClassName('amount')[0].value;
        // fetch('../actions/comment.php', {
        //     method: 'POST', 
        //     body: "text=" + com
        // });
    }
  });
