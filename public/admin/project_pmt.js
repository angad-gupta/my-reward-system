
$(document).ready(function(){
    
     $('#camp-sortable-list-first, #camp-sortable-list-second, #camp-sortable-list-third, #camp-sortable-list-forth').sortable({
        connectWith: '.sortable',
        receive : function(e, ui) {
            var status = $(ui.item).parent(".sortable").data(
                    "status-id");
            var task_id = $(ui.item).data("task-id");

            $.ajax({
               type: 'GET',
                url: '/admin/opulencecamp/changeStatus',
                data: {
                    status: status,
                    task_id: task_id
                },

                success: function(data) {
                    console.log(data); 
                   
                   

                    $('.task_graphic_show').fadeOut(800, function(){
                           $(".task_graphic_show").load(location.href + " .task_graphic_show");
                            $('.task_graphic_show').fadeIn().delay(800);

                        });
                    
                }
            });
        }
    }).disableSelection();
      
});