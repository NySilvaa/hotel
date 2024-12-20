<?php
    namespace Model;

    class RegisterModel extends Model{
        public function generateFieldsForms(){
            $questions = [
                "Dados Pessoais",
                "Endereço",
                "Dados de Contato",
                "Senha"
            ];

            if(!isset($_POST['count']))
                $_SESSION['respostas'] = [];

           if(isset($_POST['count'])){
                //$_SESSION['respostas'][$_POST['count']] = $_POST['answer'];

                if(count($questions) == (int)$_POST['count'] + 1)
                    die('Terminou o exame.'); 
           }
            
            $index = isset($_POST['count']) ? (int)$_POST['count'] +1 : 0;

            return [$index, $questions];
        }

        public function createFieldsForms($nameField){
            $fields = [
                "Dados Pessoais" => [ "Nome", "CPF", "RG", "Data de Nascimento", "Gênero"],
                "Endereço" => ["CEP", "Estado", "Logradouro", "Nº", "Complemento"],
                "Dados de Contato" => ["E-mail", "Telefone Celular"],
                "Senha" => ["Criar Senha", "Repetir a Senha"]
            ];

            $icons = [
                "Dados Pessoais" => [
                    "Nome" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>',
                    "CPF" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-id-card"><path d="M16 10h2"/><path d="M16 14h2"/><path d="M6.17 15a3 3 0 0 1 5.66 0"/><circle cx="9" cy="11" r="2"/><rect x="2" y="5" width="20" height="14" rx="2"/></svg>',
                    "RG" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-id-card"><path d="M16 10h2"/><path d="M16 14h2"/><path d="M6.17 15a3 3 0 0 1 5.66 0"/><circle cx="9" cy="11" r="2"/><rect x="2" y="5" width="20" height="14" rx="2"/></svg>',
                    "Data de Nascimento" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>',
                    "Gênero" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>'
                ],

                "Dados de Contato" => [
                    "E-mail" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>',
                    "Telefone Celular" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-smartphone"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>'
                ]
            ];

            $valuePlaceholder = [
                "Name" => "Ex.: João da Silva",
                "CPF" => "Digite Apenas os Números. (Ex.: 000.000.000-00)",
                "RG" => "Digite Apenas os Números. (Ex.: 00.000.000-0 / 00.000.000-00)",
                "CEP" => "Ex.: 00.000-000",
                "Logradouro" => "Ex: Rua Tancredo Neves",
                "Nº" => "Ex.: Nº 44",
                "Complemento" => "Ex.: Apt. Santa Maria, Bloco B12",
                "E-mail" => "Ex.: email@dominio.com",
                "Telefone Celular" => "Digite Apenas os Números. Ex.: (00) 0 0000-0000"
            ];

            foreach ($fields[$nameField] as $value) {
                switch ($nameField) {
                    case 'Dados Pessoais':
                        echo '
                            <div class="flex-column">
                            <label>'.$value.'</label>
                        </div>
                        <div class="inputForm">
                            '.$icons[$nameField][$value].'
                            <input type="text" class="input" placeholder="Digite O valor esperado" name="answer" />
                        </div>
                        '; 
                    break;

                    case 'Dados de Contato':
                        echo '
                            <div class="flex-column">
                            <label>'.$value.'</label>
                        </div>
                        <div class="inputForm">
                            '.$icons[$nameField][$value].'
                            <input type="text" class="input" placeholder="Digite O valor esperado" name="answer" />
                        </div>
                        '; 
                    break;
                    
                    case 'Endereço':
                        echo '
                            <div class="flex-column">
                            <label>'.$value.'</label>
                        </div>
                        <div class="inputForm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                            <input type="text" class="input" placeholder="Digite O valor esperado" name="answer" />
                        </div>
                        '; 
                    break;

                    case 'Senha':
                        echo '
                        <div class="flex-column">
                            <label>'.$value.' </label>
                        </div>
                        <div class="inputForm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            <input type="password" class="input" placeholder="Enter your Password" />
                        </div>';
                    break;

                    default:
                        # code...
                    break;
                }
            };
        }
    }

?>