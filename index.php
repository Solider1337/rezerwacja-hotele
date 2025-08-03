<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rezerwuj Hotel - Znajdź swój idealny nocleg</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <script defer src="main.js"></script>
</head>

<body>
  <div class="cursor-effect" aria-hidden="true"></div>
  <header class="header" role="banner">
    <div class="container">
      <a href="#" class="logo" aria-label="Strona główna">🏨 RezerwujHotel</a>
      <nav aria-label="Główna nawigacja">
        <ul class="nav">
          <li><a href="#oferty">Oferty</a></li>
          <li><a href="#opinie">Opinie</a></li>
          <li><a href="#kontakt">Kontakt</a></li>
          <?php if (isset($_SESSION['user_name'])): ?>
  <li><span>Witaj, <?= htmlspecialchars($_SESSION['user_name']) ?>!</span></li>
  <li><a href="auth/logout.php" class="button">Wyloguj się</a></li>
<?php else: ?>
  <li><a href="#" class="button" onclick="openModal()">Zaloguj się</a></li>
  <li><a href="#" class="button" onclick="openRegisterModal()">Zarejestruj się</a></li>
<?php endif; ?>


        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero" aria-label="Wprowadzenie">
      <div class="hero-bg" aria-hidden="true"></div>
      <div class="container">
        <h1>Zarezerwuj swój raj już dziś</h1>
        <p>Znajdź idealny nocleg w kilka sekund. Luksus, wygoda i dostępność w jednym miejscu.</p>
        <a href="#oferty" class="button">Zobacz oferty</a>
      </div>
    </section>

    <section class="oferty" id="oferty" aria-labelledby="oferty-heading">
      <div class="container">
        <h2 id="oferty-heading">Polecane miejsca</h2>
        <div class="cards">
          <a href="hotel.html?hotel=hotel-nadmorski" class="card" tabindex="0" aria-label="Hotel Nadmorski, Gdańsk">
            <img src="images/hotel1.webp" alt="Widok na hotel przy plaży" />
            <div class="card-content">
              <h3>Hotel Nadmorski</h3>
              <p>Gdańsk, Polska</p>
              <p class="price">od 250 zł / noc</p>
            </div>
          </a>

          <a href="hotel.html?hotel=city-loft" class="card" tabindex="0" aria-label="City Loft, Warszawa">
            <img src="images/hotel2.webp" alt="Wnętrze apartamentu w centrum miasta" />
            <div class="card-content">
              <h3>City Loft</h3>
              <p>Warszawa, Polska</p>
              <p class="price">od 320 zł / noc</p>
            </div>
          </a>
          


          <a href="hotel.html?hotel=chata-w-tatrach" class="card" tabindex="0" aria-label="Chata w Tatrach, Zakopane">
            <img src="images/hotel3.webp" alt="Drewniany domek w górach zimą" />
            <div class="card-content">
              <h3>Chata w Tatrach</h3>
              <p>Zakopane, Polska</p>
              <p class="price">od 200 zł / noc</p>
            </div>
          </a>
        </div>
      </div>
    </section>

    <section class="opinie" id="opinie" aria-labelledby="opinie-heading">
      <div class="container">
        <h2 id="opinie-heading">Co mówią nasi klienci?</h2>
        <div class="opinie-list">
          <blockquote>
            <p>"Najlepsza platforma do rezerwacji noclegów! Wszystko intuicyjne i szybkie."</p>
            <footer>- Anna, Kraków</footer>
          </blockquote>

          <blockquote>
            <p>"Świetne oferty i profesjonalna obsługa klienta. Polecam każdemu!"</p>
            <footer>- Marek, Poznań</footer>
          </blockquote>
        </div>
      </div>
    </section>

    <section class="kontakt" id="kontakt" aria-labelledby="kontakt-heading">
      <div class="container">
        <h2 id="kontakt-heading">Skontaktuj się z nami</h2>
        <form aria-label="Formularz kontaktowy">
          <label for="name">Imię i nazwisko</label>
          <input type="text" id="name" name="name" required />

          <label for="email">Adres e-mail</label>
          <input type="email" id="email" name="email" required />

          <label for="message">Wiadomość</label>
          <textarea id="message" name="message" rows="5" required></textarea>

          <button type="submit" class="button">Wyślij wiadomość</button>
        </form>
      </div>
    </section>
  </main>

<!-- MODAL LOGOWANIA -->
<div id="login-modal" class="modal" style="display: none;">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <form method="POST" action="auth/login.php">
      <h2>Zaloguj się</h2>
      <input type="email" name="email" placeholder="Adres e-mail" required />
      <input type="password" name="password" placeholder="Hasło" required />
      <button type="submit" class="button">Zaloguj się</button>
    </form>
  </div>
</div>
<!-- MODAL REJESTRACJI -->
<div id="register-modal" class="modal" style="display: none;">
  <div class="modal-content">
    <span class="close" onclick="closeRegisterModal()">&times;</span>
    <form method="POST" action="auth/register.php">
      <h2>Rejestracja</h2>
      <input type="text" name="name" placeholder="Imię i nazwisko" required />
      <input type="email" name="email" placeholder="Adres e-mail" required />
      <input type="password" name="password" placeholder="Hasło" required />
      <button type="submit" class="button">Zarejestruj się</button>
    </form>
    <p style="margin-top:1rem;">Masz już konto? <a href="#" onclick="switchToLogin()">Zaloguj się</a></p>
  </div>
</div>


</body>

</html>
