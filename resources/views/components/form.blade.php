<x-layout>
    <div>{{ $slot }}</div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Validação dos dados do formulário. -->
    <script>
        $(document).ready(function(){
            $('#clienteForm').on('submit',function(e){
                let isValid = true;
                let errorMessage = '';
                const nome = $('#nome').val();
                const cpf_cnpj = $('#cpf_cnpj').val();
                const foto = $('#foto')[0].files[0];

                if(!nome){
                    errorMessage += 'O nome é obrigatório.\n';
                    isValid=false;
                }
                if(!cpf_cnpj){
                    errorMessage += ('O CPF/CNPJ é obrigatório.');
                    isValid=false;
                }

                if(foto){
                    const tipos = ['image/jpeg','image/jpg','image/png'];
                    if (!tipos.includes(foto.type)){
                        errorMessage += 'A foto deve ser do tipo JPG, JPEG ou PNG.';
                        isValid = false;
                    }

                }

                if(!isValid){
                    alert(errorMessage);
                    e.preventDefault();
                }
            });
        });
    </script>
</x-layout>