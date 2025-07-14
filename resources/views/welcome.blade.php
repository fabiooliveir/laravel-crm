<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao CRM</title>
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        /* Define a fonte Inter como padrão */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Animação para o brilho sutil no fundo */
        @keyframes glow-pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.4;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.6;
            }
        }

        .glow-pulse {
            animation: glow-pulse 10s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 antialiased">

    <!-- Container Principal -->
    <div class="relative min-h-screen flex items-center justify-center p-4 overflow-hidden">
        
        <!-- Efeito de Fundo: Gradiente e Brilho -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-black to-gray-800"></div>
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-700/30 rounded-full filter blur-3xl opacity-50 glow-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-700/30 rounded-full filter blur-3xl opacity-50 glow-pulse" style="animation-delay: 5s;"></div>
        </div>

        <!-- Conteúdo Principal -->
        <main class="relative z-10 flex flex-col items-center text-center max-w-4xl mx-auto">
            
            <!-- Ícone/Logo -->
            <div class="mb-6">
                <svg class="w-20 h-20 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                </svg>
            </div>

            <!-- Título Principal -->
            <h1 class="text-4xl md:text-6xl font-black tracking-tighter text-white mb-4">
                Transforme seu Relacionamento com o Cliente
            </h1>

            <!-- Subtítulo -->
            <p class="max-w-2xl text-lg md:text-xl text-gray-300 mb-10">
                Nossa plataforma de CRM centraliza suas informações, otimiza processos e impulsiona suas vendas. Acesse agora e veja a diferença.
            </p>

            <!-- Botão de Ação (Login) -->
            <div>
                <!-- 
                  IMPORTANTE: No seu arquivo Blade, troque o href="./login" por "{{ route('admin.session.create') }}" 
                  para que o botão redirecione corretamente para a tela de login do seu sistema.
                -->
                <a href="./admin/login" 
                   class="inline-block px-10 py-4 text-lg font-bold text-white bg-blue-600 rounded-lg shadow-xl hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 transform hover:scale-105">
                    Acessar o CRM
                </a>
            </div>

        </main>

        <!-- Rodapé -->
        <footer class="absolute bottom-6 text-gray-500 text-sm z-10">
            <p>&copy; {{ date('Y') }} Sua Empresa. Todos os direitos reservados.</p>
        </footer>
    </div>

</body>
</html>
