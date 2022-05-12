$(document).ready(function () {

    


    $(".sort").click(function () {
        var element = $(this);
        var cur_id = element.attr('id');
        if (element.attr('id').endsWith("DESC")) {
            element.attr('id', element.attr('id').split("DESC")[0]);
        } else if (!element.attr('id').startsWith("genre")) {
            element.attr('id', element.attr('id') + 'DESC');
        }

        var id;
        //каждый клик смотрим значения чекбоксов и формируем id, если активен хотя бы 1 чекбокс, например "genre RPG 2D "
        var count = $(':checkbox:checked').length;
        if (count > 0) {
            id = "genre "
            $('input:checkbox:checked').each(function () {
                id += $(this).attr('value') + ' ';
            });
        }
        
        
        var sort_items = document.getElementsByClassName("sort");
        
        // если id элемента заканчивается на "DESC", то убираем "DESC"
        for (var i = 0; i < sort_items.length; i++) {
            var cur_el = $(sort_items[i]);
            if (cur_el.attr('id') != element.attr('id')) {
                //var el_id = cur_el.attr('id');
                //console.log(el_id);
                  if (cur_el.attr('id').endsWith("DESC")) {
                      cur_el.attr('id', cur_el.attr('id').split("DESC")[0]);
                  }
            }
        }
        if (count != 0 && element.attr('class').endsWith("asc_desc")) {
            id += cur_id;
        } else if (count == 0 && element.attr('class').endsWith("asc_desc")) {
            id = cur_id;
        }

        console.log(id);
        $.ajax({
            url: 'games.php',
            data: 'sort_id=' + id,
            type: 'get',
            success: function (html) {
                $(".game").html(html);
                //if (element.attr('id').endsWith("DESC")) {
                //    element.attr('id', element.attr('id').split("DESC")[0]);
                //} else if (!element.attr('id').startsWith("genre")) {
                //    element.attr('id', element.attr('id') + 'DESC');
                //}
            }
        });
    });
});