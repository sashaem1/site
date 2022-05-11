var $btn = document.getElementsByClassName('btn')[0];
var $title = document.getElementsByClassName('title')[0];
$btn.addEventListener('click', function(event) {
    if(!document.getElementsByClassName('amount')[0]){
        $btn.style.visibility = "hidden";
        var $form = document.createElement('form');
        $form.action = "actions/review.php";
        $form.method = "post";

        var $btn_block = document.createElement('div');
        $btn_block.classList.add('btn_block');
        $btn_block.style.display = 'flex';

        var $grade_block = document.createElement('div');
        $grade_block.classList.add('grade_block');
        // $grade_block.style.display = 'flex';

        var $rev_txt = document.createElement('p');
        $rev_txt.innerHTML = "Оценка :";


        var $input = document.createElement('input');
        $input.type = 'text';
        $input.name = "text";
        $input.placeholder = 'Ваш комментарий';
        $input.classList.add('amount');

        var $com_btn = document.createElement('button');
        $com_btn.classList.add('com_btn');
        $com_btn.innerHTML = "Отправить";

        var $grade = document.createElement('select');
        $grade.classList.add('grade');
        $grade.name = "grade";

        var $opt1 = document.createElement('option');
        $opt1.value = 1;
        $opt1.innerHTML = "1";

        var $opt2 = document.createElement('option');
        $opt2.value = 2;
        $opt2.innerHTML = "2";

        var $opt3 = document.createElement('option');
        $opt3.value = 3;
        $opt3.innerHTML = "3";

        var $opt4 = document.createElement('option');
        $opt4.value = 4;
        $opt4.innerHTML = "4";

        var $opt5 = document.createElement('option');
        $opt5.value = 5;
        $opt5.innerHTML = "5";

        var $opt6 = document.createElement('option');
        $opt6.value = 6;
        $opt6.innerHTML = "6";

        var $opt7 = document.createElement('option');
        $opt7.value = 7;
        $opt7.innerHTML = "7";

        var $opt8 = document.createElement('option');
        $opt8.value = 8;
        $opt8.innerHTML = "8";

        var $opt9 = document.createElement('option');
        $opt9.value = 9;
        $opt9.innerHTML = "9";

        var $opt10 = document.createElement('option');
        $opt10.value = 10;
        $opt10.innerHTML = "10";

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
        // $grade.after($input);
        // $grade.append($opt1);
        $form.append($btn_block);
        $btn_block.append($grade_block);
        $grade_block.append($grade);
        $grade.before($rev_txt);
        $grade.append($opt1);
        $grade.append($opt2);
        $grade.append($opt3);
        $grade.append($opt4);
        $grade.append($opt5);
        $grade.append($opt6);
        $grade.append($opt7);
        $grade.append($opt8);
        $grade.append($opt9);
        $grade.append($opt10);
        $btn_block.append($com_btn);
        $com_btn.after($cancell_btn);
    }
  });
