let notificationData = {
  action: "get_notifications",
};
let notifications = document.getElementById("notifications")
fetch("/accountly/server/controllers/controllerData.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json; charset=utf-8",
  },
  body: JSON.stringify(notificationData),
})
  .then((res) => res.json())
  .then((dat) => {
    console.log(dat);
    notifications.innerHTML = dat.content
  }).catch((err) => console.log(err));