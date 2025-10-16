// assets/js/referral.js
(async () => {
  const params = new URLSearchParams(window.location.search);
  const source = params.get("utm_source") || "unknown";
  const medium = params.get("utm_medium") || "direct";
  const campaign = params.get("utm_campaign") || "none";
  const timestamp = new Date().toISOString();

  try {
    await fetch("/backend/save_ref.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ source, medium, campaign, timestamp }),
    });
  } catch (err) {
    console.error("Error logging referral:", err);
  }

  // Redirect to your Instagram
  setTimeout(() => {
    window.location.href = "https://www.instagram.com/talk2klyro";
  }, 1500);
})();
