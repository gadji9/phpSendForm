$('document').ready(function(){
    let my_event;
    $('form').submit(function(event){
        my_event = event
            
             
    })

    
    $('form').validate({
        rules:{
            name: {
                required:true,
                minlength:2
            },
            email: {
                required: true,
                email: true
            },
            com: {
                required: true,
            }
        },
        messages:{
            name: {
                required: 'Поле обязательно для заполнения',
                minlength: 'Поле должно содержать минимум 2 символа',
            },
            email:{
                required: 'Поле обязательно для заполнения',
                email:'Пожалуйста, введите  настоящий email'
            },
            com: {
                required: 'Поле обязательно для заполнения',
            }
        },
        submitHandler: function(form) {
                my_event.preventDefault();
                $.ajax({
                            type: 'post',
                            url: 'send.php',
                            data: new FormData(form),
                            contentType:false,
                            cache:false,
                            processData:false,
                            success: function(e){
                                $('body').load('/index.php', function(){
                                })
                            }
                        });
        },
        errorPlacement: function(error, element) {
            const elem = '.' + element[0].name + '-label'
            error.insertAfter($(elem))
            console.log(error)
        }
    })
})