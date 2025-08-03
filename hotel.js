document.addEventListener("DOMContentLoaded", () => {
    const params = new URLSearchParams(window.location.search);
    const hotelKey = params.get("hotel");
  
    const hotele = {
      "hotel-nadmorski": {
        nazwa: "Hotel Nadmorski",
        lokalizacja: "Gdańsk, Polska",
        cena: "od 250 zł / noc",
        opis: "Luksusowy hotel z widokiem na Bałtyk, idealny na wypoczynek z rodziną.",
        zdjecie: "images/hotel1.webp"
      },
      "city-loft": {
        nazwa: "City Loft",
        lokalizacja: "Warszawa, Polska",
        cena: "od 320 zł / noc",
        opis: "Nowoczesny apartament w sercu miasta z widokiem na Pałac Kultury.",
        zdjecie: "images/hotel2.webp"
      },
      "chata-w-tatrach": {
        nazwa: "Chata w Tatrach",
        lokalizacja: "Zakopane, Polska",
        cena: "od 200 zł / noc",
        opis: "Drewniany domek w górach, doskonały na ferie zimowe i wypady na szlaki.",
        zdjecie: "images/hotel3.webp"
      }
    };
  
    const hotel = hotele[hotelKey];
    const container = document.getElementById("hotel-info");
  
    if (!hotel) {
      container.innerHTML = `<p>Nie znaleziono informacji o hotelu.</p>`;
      return;
    }
  
    container.innerHTML = `
      <h1>${hotel.nazwa}</h1>
      <img src="${hotel.zdjecie}" alt="${hotel.nazwa}" style="width:100%; border-radius:12px; max-height:400px; object-fit:cover; margin-bottom: 1rem;">
      <p><strong>Lokalizacja:</strong> ${hotel.lokalizacja}</p>
      <p><strong>Cena:</strong> ${hotel.cena}</p>
      <p style="margin: 1rem 0;">${hotel.opis}</p>
  
      <h2>Zarezerwuj pobyt</h2>
      <form id="booking-form" style="display: grid; gap: 1rem; max-width: 500px; margin-top: 1rem;">
        <label>
          Imię i nazwisko:
          <input type="text" required />
        </label>
        <label>
          Data przyjazdu:
          <input type="date" required />
        </label>
        <label>
          Data wyjazdu:
          <input type="date" required />
        </label>
        <label>
          Liczba osób:
          <input type="number" min="1" max="10" required />
        </label>
        <button type="submit" class="button">Zarezerwuj</button>
      </form>
      <div id="booking-confirmation" style="margin-top: 1rem; color: green; display: none;">
        ✅ Rezerwacja wysłana! Skontaktujemy się wkrótce.
      </div>
    `;
  
    const form = document.getElementById("booking-form");
    const confirmation = document.getElementById("booking-confirmation");
  
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      confirmation.style.display = "block";
      form.reset();
    });
  });
  