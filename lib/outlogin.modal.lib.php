<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$outlogin_url        = login_url($urlencode);
$outlogin_action_url = G5_HTTPS_BBS_URL.'/login_check.php';

?>

<style>
body {width:100%; height:100%}
html {width:100%; height:100%}
    
.layer_login {
    display: none;
    width: 500px;
    position: fixed;
    top: 50%;
    left: 50%;
    margin: -250px 0px 0px -250px;
    background: #FFFFFF;
    border-radius: 10px;
    z-index: 999999;
    border: 3px solid #AF8CF8;
}
    
.login_bg {
        position: fixed;
        display: none;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.6);
        z-index: 99999;
}

@media(max-width: 767px) {
    .layer_login {width: 400px;  margin: -250px 0px 0px -200px;} 
}


.layer_logins {
    box-shadow: 30px 30px 70px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}

.layer_login h2 {
    color: #AF8CF8;
    font-size: 20px;
    font-weight: 400;
    text-align: left;
    padding: 30px 0px 20px 25px
}

.layer_login a {
    color: #46485c;
    text-decoration: none;
}


.layer_login .user,
.layer_login .pw {
    background-color: #f3f3f3;
    width: 90%;
    border-radius: 4px;
    margin: 5px auto;
}

.layer_login .user:hover,
.layer_login .pw:hover {}

.layer_login input[type="text"],
.layer_login input[type="password"] {
    width: 90%;
    padding: 20px 0px;
    background: transparent;
    border: 0;
    outline: none;
    color: #222;
    margin: 0 auto;
    text-indent: 20px;
    font-weight: bold;
}

.layer_login input[type=checkbox] {
    display: none;
}

/*
.layer_login label {
  display: block;
  position: absolute;
  margin-top: 2px;
  width: 6px;
  height: 6px;
  border-radius: 2px;
  content: "";
  transition: all 0.5s ease-in-out;
  cursor: pointer;
  border: 3px solid white;
  box-shadow: 0px 0px 0px 2px #ccc;
  box-sizing: content-box;
}

.layer_login #remember:checked ~ label[for=remember] {
  background: #AF8CF8;
  border: 3px solid white;
  box-shadow: 0px 0px 0px 2px #AF8CF8;
}

*/

.layer_login input[type="submit"] {
    background: #AF8CF8;
    border: 0;
    height: 50px;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    padding: 0px 25px;
    cursor: pointer;
    width: 100%;
}

.layer_login input[type="submit"]:hover {}

.layer_login .forgot {
    margin-top: 10px;
    display: block;
    font-size: 13px;
    text-align: left;
    font-weight: bold;
    color: #b5b5b5;
    padding: 0 0 7px 25px;
}

.layer_login .bt_div {
    width: 90%;
    margin: 0 auto;
}

.layer_login .forgot a {
    padding: 0 !important
}

.layer_login ::-webkit-input-placeholder {
    color: #777;
    font-weight: bold;
}



.layer_login .remember {
    padding: 20px 0px;
    font-size: 12px;
    margin-left: 25px;
    line-height: 15px;
    display: inline-block;
    width: 40%;
    float:left;
}
.layer_login .remember2 {
    padding: 20px 0px;
    font-size: 12px;
    margin-right: 25px;
    line-height: 15px;
    display: inline-block;
    width: 40%;
    float:right;
    text-align: right;
}

.layer_login .forgot h4 {
    font-size: 16px;
    font-weight: normal;
    margin-bottom: 5px;
}

.layer_login .forgot a {
    color: #777;
}

.layer_login .close {
    width: 32px;
    height: 32px;
    display: block;
    border: 0;
    position: absolute;
    top: 20px;
    right: 20px;
    padding: 0px;
    cursor: pointer;
}

.layer_login .close:after {
    content: '';
    display: block;
    position: absolute;
    width: 3px;
    height: 16px;
    transform: rotate(45deg);
    background: #ccc;
    margin: -8px 0px 0px 14px
}

.layer_login .close:before {
    content: '';
    display: block;
    position: absolute;
    width: 3px;
    height: 16px;
    transform: rotate(-45deg);
    background: #ccc;
    margin: -8px 0px 0px 14px
}

.layer_login .close:hover:before,
.layer_login .close:hover:after {
    background: #777;
    transition: all 0.2s linear;
}

.layer_login #SignIn {
    border: 2px solid white;
    background: transparent;
    padding: 10px 35px;
    margin: -21px 0px 0px -57px;
    color: white;
    border-radius: 20px;
    cursor: pointer;
    position: absolute;
    top: 50%;
    left: 50%;
    outline: none;

}

@keyframes bounceInDown {
    0% {
        opacity: 0;
        transform: translateY(-2000px);
    }

    60% {
        opacity: 1;
        transform: translateY(30px);
    }

    80% {
        transform: translateY(-10px);
    }

    100% {
        transform: translateY(0);
    }
}
</style>

<div class="login_bg"></div>
<div class="layer_login">
    
    <div class="layer_logins">
        
        <button class="close"></button>
        
		<?php if($is_member){?>
			<div class="top">
                <h2>Profile</h2>
            </div>

           

            <div class="remlog">
                <div class="remember">
					<!--
                    <input id="remember" name="auto_login" value="1" type="checkbox">
                    <label for="remember">자동로그인</label>
					-->
                </div>
                <div class="remember2">
                    <a href="<?php echo G5_BBS_URL ?>/logout.php">Log Out</a>　
                    <a href="<?php echo G5_BBS_URL ?>/password_lost.php" class="layer_password_lost">PASS LOST</a>
                </div>
                <div style="clear:both"></div>
            </div>
		<?php } else { ?>
        <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
        <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
           
            <div class="top">
                <h2>Login</h2>
            </div>

            <div class="user">
                <input name="mb_id" placeholder="ID" type="text" required>
            </div>
            <div class="pw">
                <input name="mb_password" placeholder="Password" type="password" required>
            </div>
            <div class="bt_div">
                <input type="submit" value="Login">
            </div>

            <div class="remlog">
                <div class="remember">
					<!--
                    <input id="remember" name="auto_login" value="1" type="checkbox">
                    <label for="remember">자동로그인</label>
					-->
                </div>
                <div class="remember2">
                    <a href="<?php echo G5_BBS_URL ?>/register.php">JOIN</a>　
                    <a href="<?php echo G5_BBS_URL ?>/password_lost.php" class="layer_password_lost">PASS LOST</a>
                </div>
                <div style="clear:both"></div>
            </div>
            
        </form>
		<?php } ?>
        
    </div>
</div>

<script>
    $('.SignIn').on('click', function() {
        $('.layer_login').show();
        $('.login_bg').show();
    });

    $('.close').on('click', function() {
        $('.layer_login').hide();
        $('.login_bg').hide();
    });
    $(function() {
        $(".layer_password_lost").click(function() {
            win_password_lost(this.href);
            return false;
        });

        var input = document.createElement("input");
        if (('placeholder' in input) == false) {
            $('[placeholder]').focus(function() {
                var i = $(this);
                if (i.val() == i.attr('placeholder')) {
                    i.val('').removeClass('placeholder');
                    if (i.hasClass('password')) {
                        i.removeClass('password');
                        this.type = 'password';
                    }
                }
            }).blur(function() {
                var i = $(this);
                if (i.val() == '' || i.val() == i.attr('placeholder')) {
                    if (this.type == 'password') {
                        i.addClass('password');
                        this.type = 'text';
                    }
                    i.addClass('placeholder').val(i.attr('placeholder'));
                }
            }).blur().parents('form').submit(function() {
                $(this).find('[placeholder]').each(function() {
                    var i = $(this);
                    if (i.val() == i.attr('placeholder'))
                        i.val('');
                })
            });
        }
    });

</script>
