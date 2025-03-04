<?php

    namespace Model;
    use Model\HomeModel;

class RegisterModel extends Model{
    private static $homeModel;

    public function generateFieldsForms()
    {
        $questions = [
            "Dados Pessoais",
            "Endereço",
            "Dados de Contato",
            "Senha"
        ];

        $index = 0;
        $control = true;

        if (isset($_POST['count'])) {
            if ((int)$_POST['count'] == 0 && self::validateFieldsForms($_POST) !== false)
                $index++;
            else if ((int)$_POST['count'] == 1 && self::validateFieldsForms($_POST) !== false)
                $index =  (int)$_POST['count'] + 1;    
            else if ((int)$_POST['count'] == 2 && self::validateFieldsForms($_POST) !== false)
                $index =  (int)$_POST['count'] + 1;
            else if ((int)$_POST['count'] == 3 && self::validateFieldsForms($_POST) !== false)
                $index =  (int)$_POST['count'] + 1;
            else{
                $control = false;
                $index = (int)$_POST['count'];
            }

            if (($control == true) && count($questions) == (int)$_POST['count'] + 1){
                if($this->registerDB()){
                    // Deu certo o cadastro
                    $_SESSION['register'] = true;
                    header('Location: '.PATH_PAGES.'login/');
                    die();
                }else{
                    self::$homeModel = new HomeModel();
                    self::$homeModel->messageBook("error", "Cadastro não realizado", "Ocorreu um erro ao registrar-se.");
                    return false;
                }
            } 
        }

        return [$index, $questions, $control];
    }

    public function createFieldsForms($nameField)
    {
        $fields = [
            "Dados Pessoais" => ["Nome", "CPF", "RG", "Data-de-Nascimento", "Gênero"],
            "Endereço" => ["CEP", "UF", "Cidade", "Bairro", "Logradouro", "Nº", "Complemento"],
            "Dados de Contato" => ["E-mail", "Celular"],
            "Senha" => ["Criar Senha", "Repetir a Senha"]
        ];

        $icons = [
            "Dados Pessoais" => [
                "Nome" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>',
                "CPF" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-id-card"><path d="M16 10h2"/><path d="M16 14h2"/><path d="M6.17 15a3 3 0 0 1 5.66 0"/><circle cx="9" cy="11" r="2"/><rect x="2" y="5" width="20" height="14" rx="2"/></svg>',
                "RG" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-id-card"><path d="M16 10h2"/><path d="M16 14h2"/><path d="M6.17 15a3 3 0 0 1 5.66 0"/><circle cx="9" cy="11" r="2"/><rect x="2" y="5" width="20" height="14" rx="2"/></svg>',
                "Data-de-Nascimento" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>',
                "Gênero" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>'
            ],

            "Dados de Contato" => [
                "E-mail" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>',
                "Celular" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-smartphone"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>'
            ]
        ];

        $valuePlaceholder = [
            "Nome" => "Ex.: João da Silva",
            "CPF" => "Ex.: 000.000.000-00",
            "RG" => "Ex.: 00.000.000-0 / 00.000.000-00",
            "CEP" => "Ex.: 00.000-000",
            "Data-de-Nascimento" => "00/00/0000",
            "Gênero" => "Male / Female / Other",
            "Bairro" => "Ex.: Jd. das Graças",
            "Cidade" => "Ex.: Sorocaba",
            "Logradouro" => "Ex: Rua Tancredo Neves",
            "Nº" => "Ex.: Nº 44",
            "Complemento" => "Ex.: Apt. Santa Maria, Bloco B12",
            "E-mail" => "Ex.: email@dominio.com",
            "Celular" => "Ex.: (00) 0 0000-0000"
        ];

        foreach ($fields[$nameField] as $key => $value) {
            switch ($nameField) {
                case 'Dados Pessoais':
                    $id = str_replace(" ", "-", $value);

                    if (isset($valuePlaceholder[$value])) {
                        echo '
                                <div class="form-box" >
                                    <div class="flex-column">
                                        <label>' . $value . '</label>
                                    </div>
                                    <div class="inputForm">
                                        ' . $icons[$nameField][$value] . '
                                        <input type="text" class="input" id="' . strtolower($id) . '" placeholder="' . $valuePlaceholder[$value] . '" name="' . $value . '" />
                                    </div>
                                </div>
                            ';
                    } else {
                        echo '
                                <div class="form-box" >
                                    <div class="flex-column">
                                    <label>' . $value . '</label>
                                </div>
                                <div class="inputForm">
                                    ' . $icons[$nameField][$value] . '
                                    <input type="text" class="input" id="' . strtolower($id) . '" placeholder="" name="' . $value . '" />
                                </div>
                                </div>
                            ';
                    }
                    break;

                case 'Endereço':
                    $id = str_replace(" ", "-", $value);

                    if (isset($valuePlaceholder[$value])) {
                        echo '
                            <div class="form-box" >
                                <div class="flex-column">
                                    <label>' . $value . '</label>
                                </div>
                                <div class="inputForm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                    <input type="text" class="input" id="' . strtolower($id) . '" placeholder="' . $valuePlaceholder[$value] . '" name="' . $value . '" />
                                </div>
                            </div>
                            ';
                    } else {
                        echo '
                            <div class="form-box" >
                                <div class="flex-column">
                                    <label>' . $value . '</label>
                                </div>
                                <div class="inputForm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                    <input type="text" class="input" id="' . strtolower($id) . '" placeholder="Ex: SP" name="' . $value . '" />
                                </div>
                            </div>
                            ';
                    }
                    break;

                case 'Dados de Contato':
                    $id = str_replace(" ", "-", $value);

                    if (isset($valuePlaceholder[$value])) {
                        echo '
                                <div class="form-box">
                                    <div class="flex-column">
                                    <label>' . $value . '</label>
                                    </div>
                                    <div class="inputForm">
                                        ' . $icons[$nameField][$value] . '
                                        <input type="text" class="input" id="' . strtolower($id) . '" placeholder="' . $valuePlaceholder[$value] . '" name="' . $value . '" />
                                    </div>
                                </div>
                            ';
                    } else {
                        echo '
                                <div class="form-box">
                                    <div class="flex-column">
                                    <label>' . $value . '</label>
                                </div>
                                <div class="inputForm">
                                    ' . $icons[$nameField][$value] . '
                                    <input type="text" class="input" id="' . strtolower($id) . '" placeholder="" name="' . $value . '" />
                                </div>
                                </div>
                            ';
                    }
                    break;

                case 'Senha':
                        if($key == 0){
                            echo '
                            <div class="form-box" >
                                <div class="senha-field">
                                <div class="flex-column">
                                    <label>' . $value . ' </label>
                                </div>
                                <div class="inputForm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    <input type="password" class="input" name="Password" placeholder="Create your Password" />
                                </div>
                                <span class="eye-btn-pw"><svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg></span>
                                </div>

                                <span class="txt-pw-instruccion">Sua senha deve conter:</span>
                                <ul id="instruccions-pw">
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> No mínimo 8 caracteres e no máximo 20</li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Uma Letra maiúscula</li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Uma Letra minúscula</li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Pelo menos um número</li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Pelo Menos um símbolo (Ex.: # / $ / @ / !)</li>
                                </ul>
                            </div>
                        ';
                        }else{
                            echo '
                            <div class="form-box" >
                                <div class="senha-field">
                                <div class="flex-column">
                                    <label>' . $value . ' </label>
                                </div>
                                <div class="inputForm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    <input type="password" class="input" name="confirmPassword" placeholder="Create your Password" />
                                </div>
                                <span class="eye-btn-pw"><svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg></span>
                                </div>
                            </div>
                        ';
                        }
                    break;

                default:
                    # code...
                    break;
            }
        };
    }

    public function validateFieldsForms($post)
    {
        self::$homeModel = new HomeModel();

        if (isset($post)) {
            foreach ($post as $key => $value) {
                if($key == 'validate')
                    continue;

                if ($key == 'count') {
                        if ($value == 0){
                           if($this->validatePersonalData() == false)
                                return false;
                        }else if ($value == 1){
                            if($this->validateAddressData() == false)
                                return false;
                        }else if($value == 2){
                            if($this->validateContactData() == false)
                                return false;
                        }else if($value == 3){   
                            if($this->validatePw() == false)
                                return false;
                        }
                }

                if (($key == 'Complemento' && $value == '') || $key == 'acao')
                    continue;
                else if ($value == '' || $value == null){
                    self::$homeModel->messageBook('error', 'Campos Pendentes', "Valores vazios não são permitidos");
                    return false;
                }
            }
        }
    }

    private function validatePersonalData()
    {
        self::$homeModel = new HomeModel();

        $name = strip_tags($_POST['Nome']);
        $cpf = strip_tags($_POST['CPF']);
        $rg = strip_tags($_POST['RG']);
        $dataDeNascimento = strip_tags($_POST['Data-de-Nascimento']);
        $genero = strip_tags($_POST['Gênero']);

        $nameSplit = explode(" ", $name);
        $cpfMatch = preg_match("/[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}/", $cpf);
        $rgMatch = preg_match('/[0-9]{2}\.[0-9]{3}\.[0-9]{3}-[0-9]{1}/', $rg);

        $dateFormated = explode("/", $dataDeNascimento);
        $dateNew = implode("-", array_reverse($dateFormated));

        if (count($nameSplit) < 2) {
            self::$homeModel->messageBook('error', 'Nome Inválido', "Você deve inserir o seu nome completo");
            return false;
        }

        if ($cpfMatch == null || $rgMatch == null) {
            self::$homeModel->messageBook('error', "RG ou CPF Inválidos", "Você inseriu algum dado incorreta.");
            return false;
        }

        if(strtotime($dateNew) <= strtotime("1920-01-01") || strtotime($dateNew) >= strtotime("2020-01-01")){
            self::$homeModel->messageBook("error", "Datas Inválidas", "Sua data de nascimento está incorreta");
            return false;
        }

        $_SESSION['data_user'] = [
                "Name" => $name,
                "CPF" => $cpf,
                "RG" => $rg,
                "Data de Nascimento" => $dataDeNascimento,
                "Genero" => $genero
        ];
        return true;
    }

    private function validateAddressData()
    {
        self::$homeModel = new HomeModel();

        $cep = strip_tags($_POST['CEP']);
        $uf = strip_tags($_POST['UF']);
        $cidade = strip_tags($_POST['Cidade']);
        $logradouro = strip_tags($_POST['Logradouro']);
        $numberHouse = strip_tags($_POST['Nº']);
        $complemento = strip_tags($_POST['Complemento']);

        if (strlen($uf) !== 2 && strlen($uf) !== 3) {
            self::$homeModel->messageBook("error", "UF Inválida", "O valor digitado está incorreto");
            return false;
        }else if (strlen($logradouro) < 3) {
            self::$homeModel->messageBook('error', "Logradouro Inválido", "O valor inserido é muito curto.");
            return false;
        }else if ((int)$numberHouse < 0) {
            self::$homeModel->messageBook('error', 'Número Inválido', "Valores negativos não são permitidos");
            return false;
        }else if (strlen($complemento) > 150) {
            self::$homeModel->messageBook('error', 'Complemento muito grande', "O valor inserido excede o limite permitido");
            return false;
        }else {
            $_SESSION['endereco'] = [
                    "CEP" => $cep,
                    "UF" => $uf,
                    "Cidade" => $cidade,
                    "Logradouro" => $logradouro,
                    "Number House" => $numberHouse,
                    "Complemento" => $complemento
            ];

            return true;
        }
    }

    private function validateContactData(){
        self::$homeModel = new HomeModel();

        $email = strip_tags($_POST['E-mail']);
        $phone = strip_tags($_POST['Celular']);

        if(preg_match("/[A-Za-z0-9-_]{1,}@[a-z]{1,}\.[a-z]{3}/", $email) == false){
            self::$homeModel->messageBook('error', "E-mail Inválido", "Digite o e-mail corretamente.");
            return false;
        }else if(preg_match("/^\(\d{2}\) \d \d{4}-\d{4}$/", $phone) == false){
            self::$homeModel->messageBook('error', 'Telefone Inválido',"Seu telefone foi inserido incorretamente");
            return false;
        }else{
            $_SESSION['username'] = $email;
            $_SESSION['contato'] = [
                    "Email" => $email,
                    "Phone" => $phone
            ];
            return true;
        }
    }

    private function validatePw(){
        self::$homeModel = new HomeModel();
        $pw = strip_tags($_POST['Password']);
        $confirmPw = strip_tags($_POST['confirmPassword']);

        if($pw !== $confirmPw){
            self::$homeModel->messageBook('error', 'Senhas Diferentes', "Suas senhas estão diferentes");
            return false;
        }else if(strlen($pw) < 8){
            self::$homeModel->messageBook('error', 'Senha Curta', "A senha escolhida é muito curta");
            return false;
        }else if(strlen($pw) > 20){
            self::$homeModel->messageBook('error', 'Senha muito longa', 'Sua senha é muito grande');
            return false;
        }else if(!preg_match("/[A-Z]{1,}/",$pw)){
            self::$homeModel->messageBook('error', "Senha Incorreta", "Sua Senha precisa ter uma letra maiúscula");
            return false;
        }else if(!preg_match("/[a-z]{1,}/", $pw)){
            self::$homeModel->messageBook('error', "Senha Incorreta", "Sua Senha precisa ter uma letra minúscula");
            return false;
        }else if(!preg_match('/^(?=.*[!@#$%^&*()_+={}\[\]:;"\'<>,.?\/-]).+$/', $pw) ){
            self::$homeModel->messageBook('error', "Senha Incorreta", "Sua Senha precisa ter um símbolo");
            return false;
        }else if(!preg_match("/[0-9]{1,}/", $pw)){
            self::$homeModel->messageBook('error', "Senha Incorreta", "Sua Senha precisa ter um número");
            return false;
        }else{
            $_SESSION['senha'] = ["Senha" => md5($pw)];
            return true;
        }

    }

    private function registerDB(){
        $_SESSION['user'] = [
            $_SESSION['data_user'],
            $_SESSION['endereco'],
            $_SESSION['contato'],
            $_SESSION['senha']
        ];

        $arr = [];

        foreach ($_SESSION['user'] as $key => $value) {
            if($key == 0)
                $arr = $value;
            
            if($key == 1)
                $arr["Endereco"] = $value;

            if($key == 2)
                $arr["Meios_contato"] = $value;

            if($key == 3)
                $arr["Senha"] = $_SESSION['user'][3]["Senha"];
                
        }

        $collection = parent::connectionDB()->countrys->selectCollection('users');
        $resultado = $collection->insertOne($arr);

        if ($resultado->getInsertedCount() > 0) {
            $verificacao = $collection->findOne(['Name' => $arr["Name"]]);
            $_SESSION['user'] = "";
            $arr = [];
            if($verificacao)
                return true;
            else
                return false;
        } else 
            return false;
    }
}

?>