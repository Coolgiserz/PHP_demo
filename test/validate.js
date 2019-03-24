$(document).ready(function () {
    $(':text:first').focus();
    // 手机号码验证
    $.validator.addMethod("isMobile", function(value, element) {
        var length = value.length;
        var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
        return this.optional(element) || (length == 11 && mobile.test(value));
    }, "请输入有效的手机号码!!");

    $('#register').validate({
        rules: {
            username: {
                required: true,
                maxlength: 10,

                remote: {
                    url: 'checkuser.php',
                    type: "post",
                    data: {                     //要传递的数据
                        username: function () {
                            // let uname = $("#username").val();
                            return $("#username").val();
                        }
                    },

                }
            },
            realname: {
                required: true,

            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                rangelength: [6, 18]
            },
            confirm_password: {equalTo: '#password'},
            mobile: {
                required: true,
                digits: true,
                isMobile:true
            }
        },
        messages: {
            username: {
                required: "请给一个账户名",
                maxlength: "请输入不超过10个字符",
                remote: "此账户名已存在"
            },
            realname: {
                required: "请输入您的真实姓名",
            },
            email: {
                required: "请提供您的邮箱地址",
                email: "此邮箱地址无效"
            },
            password: {
                required: '请设置账号密码',
                rangelength: '密码长度应该是6-18位哦'
            },
            confirm_password: {
                equalTo: '两次密码不匹配！'
            },
            mobile: {
                required: '请输入您的手机号码',
                digits: '请输入有效的手机号码',
                isMobile:'请输入有效的手机号码!'
            }
        },

        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        },
    })

    $('#registerbtn').on('click', function (evt) {
        evt.preventDefault();
        let is_valid = $('#register').valid();
        if (is_valid) {
            $(this).prop('disabled', 'disabled');
            onRegister();
        }else{
            alert('请认真填写表单');
        }
    });

    function onRegister() {
        let $username = $('#username').val();
        let $password = $('#password').val();
        let $realname = $('#realname').val();
        let $email = $('#email').val();
        let $mobile = $('#mobile').val();
        let registerStr = {
            "username": $username,
            "password": $password,
            "realname": $realname,
            "email": $email,
            "mobile": $mobile,
        }


        $.ajax(
            {
                url: "register.php",
                data: registerStr,
                async: true,
                cache: false,
                dataType: "json",
                success: onSuccess,
                error: onError
            });

        function onSuccess(response) {
            let res = JSON.parse(JSON.stringify(response));
            if(res["success"]==true){
                alert('注册成功！');
                $(window.location).attr('href','login.html');
            }
        }

        function onError(msg) {
            alert('错误');
        }
    }
})