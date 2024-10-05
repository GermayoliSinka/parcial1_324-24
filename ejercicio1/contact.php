<?php include 'header.php'; ?>

<main class="container mt-4">
    <header class="bg-dark text-white text-center p-4"> <!-- Cambiar el color de fondo a azul marino -->
        <h1>Trámites y Servicios</h1>
    </header>
    <section class="mt-5">
    
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <form>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mensaje</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-navy btn-block">Enviar</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <h3>Ubicación del Municipio</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.935555817299!2d-122.3320711846924!3d47.60620977918438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906b2cf2ef716b%3A0x4c2da1d8b4c9a1b1!2sSeattle%2C%20WA%2098101%2C%20EE.%20UU.!5e0!3m2!1ses!2sbo!4v1614558978881!5m2!1ses!2sbo" 
                        allowfullscreen="" 
                        loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    
    <div class="mt-5"></div>
</main>

<?php include 'footer.php'; ?>

<style>
    .btn-navy {
        background-color: #001f3f; 
        color: white;
    }
    .btn-navy:hover {
        background-color: #003366; 
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
