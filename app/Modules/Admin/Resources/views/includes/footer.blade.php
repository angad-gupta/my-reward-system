<!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                         &copy; {{date('Y')}}. <a href="javascript:void(0)" class="text-success">Reward System CMS</a> 
                    </span>
                </div>

               
            </div>
            <!-- /footer -->


<script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {

        tinymce.init({
            selector: ".simple_textarea_description", theme: "modern", width: 1600, height: 200,
        });

        tinymce.init({
            selector: ".simple_form_description", theme: "modern", width: 620, height: 200,
        });


        /*---------------------------- TINYMCE EDITOR ---------------------------*/
        tinymce.init({
            selector: ".textarea_description", theme: "modern", width: 1600, height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
            image_caption: true,
            image_advtab: true,
            relative_urls: false,
            external_filemanager_path: "/tinymce/file_manager/filemanager/",
            filemanager_title: "Responsive Filemanager",
            external_plugins: {"filemanager": "file_manager/filemanager/plugin.min.js"}
        });
    });
</script>
