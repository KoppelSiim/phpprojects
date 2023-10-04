

<div class="container">
    <form class="submitForm" method="POST" action="registration_process.php">
        <div class="form-item">
            <label for="firstName" class="form-label">Eesnimi</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Sisesta eesnimi ...">
        </div>
        <div class="form-item">
            <label for="lastName" class="form-label">Perekonnanimi</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Sisesta perekonnanimi ...">
        </div> 
        <div class="form-item">
            <label for="email" class="form-label">Emaili aadress</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Sisesta meiliaadress ...">
        </div>
        <div class="form-item">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>