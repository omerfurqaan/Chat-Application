<!DOCTYPE html>
<html>
    <head>
        <style>	
            *{
                margin: 0;
                padding: 0;
                font-family: sans-serif;
                color: #fff;
            }
            .hero{
                height: 120vh;
                width: 100%;

                background-image: url('hero.jpeg');
                background-position: center;
                background-size: cover;
					  background-attachment: fixed;
                position: absolute;
            }
            .form-box{
                color: #fff;
                width: 380px;
                height: 580px;
                position: relative;
                margin: 1% auto;
                border-radius: 20px;
                background: rgba(0, 0, 0, 0.92);
                padding: 5px;
                overflow: hidden;
            }
            .button-box{
                width: 210px;
                margin: 35px auto;
                position: relative;
                box-shadow: 0 0 2px 1px #fff;
                border-radius: 30px;
            }
            .toggle-btn{
                padding: 10px 20px;
                cursor: pointer;
                background: transparent;
                border: 0;
                outline: none;
                position: relative;
            }
            #btn{
                top: 0;
                left: 10;
                position: absolute;
                width: 110px;
                height: 100%;
                background: linear-gradient(to right,#ff105f,#ffad06);
                border-radius: 30px;
                transition: 0.5s;
            }
            
            .input-group{
                top: 180px;
                position: absolute;
                width: 280px;
                transition: 0.5s;
            }
            .input-field{
                width: 100%;
                padding: 10px 0;
                margin: 5px 0;
                border-left: 0;
                border-top: 0;
                border-right: 0;
                border-bottom: 1px solid #999;
                outline: none;
                background: transparent;
            }
            .check-box{margin: 30px 10px 30px 0;}
            span{
                color: #777;
                font-size: 12px;
                bottom: 68px;
                position: absolute;
            }
            .submit-btn{
                width: 85%;
                padding: 10px 30px;
                cursor: pointer;
                display: block;
                margin: auto;
                background: linear-gradient(to right,#ff105f,#ffad06);
                border: 0;
                outline: none;
                border-radius: 30px;
            }
					.small{
					color: Yellow;
					
					}
					a:hover {
					text-decoration: underline;
					}


            #login{
                left: 50px;
            }
            #register{
                left: 450px;
            }
            #log-btn{
                margin-top: 40px;
            }
            .option{
                padding: 10px 25px;
                color: #fff;
                margin: 30px 10px 30px 0;
                background: #000;
            }
        </style>
    </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                        <button type="button" class="toggle-btn" onclick="login()">LOG IN</button>
                        <button type="button" class="toggle-btn" onclick="register()">REGISTER</button>
                </div>
                  
                <div>
                    <form id="login" class="input-group" action="formprocess2.php" method="POST">
                        <input type="text" name="name" class="input-field" placeholder="User Name" onkeyup= "nospace(this)" required>
                        <input type="password" name="pass" class="input-field" placeholder="Password" required>
                        <button id="log-btn" type="submit" name="login" class="submit-btn">SIGN IN</button><br />
									<div class="small">forgot password? <a href ="forgot_pass.php">click here</a></div></div>
                    </form>
                    <form id="register" class="input-group" action="formprocess.php" method="POST">
                        <input type="text" name="User_name" class="input-field" placeholder="User Name" onkeyup= "nospace(this)" required>
                        <input type="email" name="User_email" class="input-field" placeholder="Email Id" required>
        			          <input type="phone-no" name="User_number" class="input-field"  placeholder="phone number " min="0" max="9" minlength="10" maxlength="10" required> <br />
								<select class="input-field" name="User_gender" placeholder="Gender" required >
								<option disabled selected>Select your gender</option>
								<option>Male</option>
								<option>Female</option>
								<option>Others</option>
								</select>
                        <input type="password" name="User_pass" class="input-field" pattern=".{8,}" placeholder="Password" title="must contain 8 characters or more" required>
                        <button type="submit" name="reg" class="submit-btn">SIGN UP</button>
                    </form>
								
                </div>
            </div>
				
        </div>
        <script>
            var x=document.getElementById("login");
            var y=document.getElementById("register");
            var z=document.getElementById("btn");
            function register(){
                x.style.left= "-400px";
                y.style.left= "50px";
                z.style.left= "100px";
            }
            function login(){
                x.style.left= "50px";
                y.style.left= "450px";
                z.style.left= "0px";
            }
function nospace(input) {
	var reg = /[^a-zA-Z0-9_]/g;
	input.value = input.value.replace(reg, "");

}
        </script>
    </body>
</html>