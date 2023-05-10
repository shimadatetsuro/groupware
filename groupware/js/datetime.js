function updateDateTime() {
    var now = new Date();
    var options = {
      year: 'numeric',
      month: 'long',
      day: 'numeric',
      weekday: 'short',
      hour: 'numeric',
      minute: 'numeric'
    };
    var dateTimeString = now.toLocaleString('ja-JP', options);
    document.getElementById('date-time').textContent = dateTimeString;
  }
  setInterval(updateDateTime, 1000); // 1秒ごとに更新する