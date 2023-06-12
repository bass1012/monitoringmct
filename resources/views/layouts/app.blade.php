<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MONITORING | MCT CARRIER</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <style>
        .hidden {
            display: none;
        }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sélection de tous les éléments avec la classe 'service-name'
            const serviceNames = document.querySelectorAll('.service-name');
            
            // Récupération des états de service depuis la variable PHP '$serviceStatuses'
            const serviceStatuses = {!! json_encode($serviceStatuses) !!};
        
            // Ajout d'un écouteur d'événement à chaque nom de service
            serviceNames.forEach(function(name) {
                name.addEventListener('click', function() {
    
                    // Retirez la classe "clicked" de tous les noms de service
                    serviceNames.forEach(function(service) {
                        service.classList.remove('clicked');
                    });
    
                    // Ajoutez la classe "clicked" au nom de service sur lequel l'utilisateur a cliqué
                    this.classList.add('clicked');
    
                    // Récupération du nom du service cliqué
                    const serviceName = this.textContent;
                    
                    // Sélection de l'élément avec l'ID 'selected-service'
                    const selectedService = document.getElementById('selected-service');
                    
                    // Recherche du service correspondant dans la variable 'serviceStatuses'
                    const service = serviceStatuses.find(function(status) {
                        return status.name === serviceName;
                    });
    
                    // Mise à jour du contenu de l'élément 'selected-service' en fonction du service sélectionné
                    if (service) {
                        selectedService.innerHTML = `
                            <h2 class="mb-4">${serviceName}</h2>
                            <p>${service.description}</p>
                        `;
                    } else {
                        selectedService.innerHTML = `
                            <h2 class="mb-4">${serviceName}</h2>
                            <p>Les détails de ce service ne sont pas disponibles.</p>
                        `;
                    }
                });
            });
        });
    </script>
    <script>
        function updateTime() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();
            var day = currentTime.toLocaleDateString(undefined, { weekday: 'long' });
            var month = currentTime.toLocaleDateString(undefined, { month: 'long' });
            var year = currentTime.getFullYear();
    
            // Formatage de l'heure, des minutes et des secondes avec des zéros devant si nécessaire
            hours = (hours < 10 ? "0" : "") + hours;
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;
    
            // Mise à jour de l'heure, du jour, du mois et de l'année dans les éléments span correspondants
            document.getElementById('current-time').textContent = hours + ":" + minutes + ":" + seconds;
            document.getElementById('container-day').textContent = day;
            document.getElementById('container-month-year').textContent = month + " " + year;
        }
    
        // Mettre à jour l'heure initiale
        updateTime();
    
        // Mettre à jour l'heure toutes les secondes
        setInterval(updateTime, 1000);
    </script>

      
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #f89d52;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo-mct.png') }}" alt="Logo" style="height: 75px; width: 75px; margin-right: 40px;">
                    <span class="container-princiapl" style="font-size: 40px; color: #ffffff;">ETAT INSTANTANE DU SYSTEME INFORMATIQUE DE MCT</span>
                </a>
            </div>
        </nav>
        </nav>
        <div class="container">
            <nav class="container-time">
                <div style="display: flex; align-items: center; justify-content: right;">
                    <div class="time-wrapper">
                        <span id="current-time">
                            <script>
                                document.getElementById('current-time').textContent = new Date().toLocaleString('fr-FR');
                            </script>
                        </span>
                    </div>
                    <span style="font-size: 40px; color: #ffffff; margin-left: 20px;"></span>
                    <span id="container-day" style="font-size: 30px; color: #ffffff;"></span>
                    <span id="container-month-year" style="font-size: 30px; color: #ffffff;"></span>
                </div>
            </nav>
        </div>
    </header>
  
    <div class="container">
        <div class="container-titre">
            <h1>Dashboard monitoring etat des services</h1>
            <h3 class="container-titre1-2">Cette page vous permet d'avoir en temps réel l'etat des services du systeme IT-MCT</h3>
        </div>
        @yield('content')
    </div>

    <footer>
        <div class="container text-center">
            <p>&copy; 2023 MCT CARRIER. Tous droits réservés.</p>
        </div>
    </footer>
    

    <script src="{{ url('js/app.js') }}"></script>
</body>
</html>
