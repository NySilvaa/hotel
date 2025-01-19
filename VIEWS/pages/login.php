<?php
    use \Model\RegisterModel;
    use \Model\HomeModel;

        $registerModel = new RegisterModel();
        $generateFieldsForm = $registerModel->generateFieldsForms();

        if(isset($_SESSION['register'])){
            $homeModel = new HomeModel();
            $homeModel->messageBook('success', 'Cadastro Feito c/ Sucesso', 'Realize o seu login');
        }
?>

<main id="register">
    <div class="container">
        <section class="register-wp">
            <section class="forms" style="width: 50%; order: 2;">
                <figure class=""><a href="/hotel" class="txt-white"><svg style="vertical-align: middle; position: relative; top: -5px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" stroke="currentColor" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-origami"><path d="M12 12V4a1 1 0 0 1 1-1h6.297a1 1 0 0 1 .651 1.759l-4.696 4.025"/><path d="m12 21-7.414-7.414A2 2 0 0 1 4 12.172V6.415a1.002 1.002 0 0 1 1.707-.707L20 20.009"/><path d="m12.214 3.381 8.414 14.966a1 1 0 0 1-.167 1.199l-1.168 1.163a1 1 0 0 1-.706.291H6.351a1 1 0 0 1-.625-.219L3.25 18.8a1 1 0 0 1 .631-1.781l4.165.027"/></svg> <h3>Roro's Hotel</h3></a></figure>

                <h2 class="tittle-form">Login Page</h2>
                <p class="desc-form">Do your Login and Have Access the User Page for Books</p>

                <form class="form" method="post" id="formRegister">
                    <h3 style="margin-bottom: 20px;">Sign In</h3>
                    <div class="form-box">
                    <div class="flex-column">
                            <label>E-mail</label>
                    </div>
                    <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        <input type="text" class="input" placeholder="Digite Seu E-mail" name="username" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>"/>
                    </div>
                    </div>

                    <div class="form-box">
                    <div class="senha-field">
                        <div class="flex-column"><label>Senha</label></div>
                            <div class="inputForm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                <input type="password" class="input" placeholder="Enter your Password"  name="password" id="password"/>
                            </div>
                            <span id="eye-pass"><svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg></span>
                    </div>
                    </div>

                    <div class="flex-row">
                        <div>
                        <input type="checkbox" id="remember" />
                        <label for="remember" class="check"></label>
                        <label>Remember me </label>
                        </div>
                        <span class="span">Forgot password?</span>
                    </div>
                    <button class="button-submit">Sign In</button>
                    <p class="p">Don't have an account? <a href="<?php echo PATH_PAGES; ?>register/" class="span">Sign Up</a></p>
                    <p class="p line">Or With</p>

                    <div class="flex-row">
                        <button class="btn google">
                        <svg
                            version="1.1"
                            width="20"
                            id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px"
                            y="0px"
                            viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512;"
                            xml:space="preserve"
                        >
                            <path
                            style="fill:#FBBB00;"
                            d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
                        c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
                        C103.821,274.792,107.225,292.797,113.47,309.408z"
                            ></path>
                            <path
                            style="fill:#518EF8;"
                            d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
                        c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
                        c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"
                            ></path>
                            <path
                            style="fill:#28B446;"
                            d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
                        c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
                        c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"
                            ></path>
                            <path
                            style="fill:#F14336;"
                            d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
                        c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
                        C318.115,0,375.068,22.126,419.404,58.936z"
                            ></path>
                        </svg>

                        Google</button
                        ><button class="btn apple">
                        <svg
                            version="1.1"
                            height="20"
                            width="20"
                            id="Capa_1"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px"
                            y="0px"
                            viewBox="0 0 22.773 22.773"
                            style="enable-background:new 0 0 22.773 22.773;"
                            xml:space="preserve"
                        >
                            <g>
                            <g>
                                <path
                                d="M15.769,0c0.053,0,0.106,0,0.162,0c0.13,1.606-0.483,2.806-1.228,3.675c-0.731,0.863-1.732,1.7-3.351,1.573 c-0.108-1.583,0.506-2.694,1.25-3.561C13.292,0.879,14.557,0.16,15.769,0z"
                                ></path>
                                <path
                                d="M20.67,16.716c0,0.016,0,0.03,0,0.045c-0.455,1.378-1.104,2.559-1.896,3.655c-0.723,0.995-1.609,2.334-3.191,2.334 c-1.367,0-2.275-0.879-3.676-0.903c-1.482-0.024-2.297,0.735-3.652,0.926c-0.155,0-0.31,0-0.462,0 c-0.995-0.144-1.798-0.932-2.383-1.642c-1.725-2.098-3.058-4.808-3.306-8.276c0-0.34,0-0.679,0-1.019 c0.105-2.482,1.311-4.5,2.914-5.478c0.846-0.52,2.009-0.963,3.304-0.765c0.555,0.086,1.122,0.276,1.619,0.464 c0.471,0.181,1.06,0.502,1.618,0.485c0.378-0.011,0.754-0.208,1.135-0.347c1.116-0.403,2.21-0.865,3.652-0.648 c1.733,0.262,2.963,1.032,3.723,2.22c-1.466,0.933-2.625,2.339-2.427,4.74C17.818,14.688,19.086,15.964,20.67,16.716z"
                                ></path>
                            </g>
                            </g>
                        </svg>

                        Apple
                        </button>
                    </div>
                </form>
            </section>

            <section class="bg-form-video" style="width: 50%; order: 1;">
                <video src="<?php echo PATH_INTERATIONS; ?>images/bg-video-register2.mp4" loop muted  autoplay height="800"  style="width: 100%"></video>
            </section>
        </section>
    </div><!-- /.container -->
</main>