let d = {
  action: "update_data",
};
fetch("/accountly/server/controllers/controllerData.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json; charset=utf-8",
  },
  body: JSON.stringify(d),
})
  .then((res) => res.json())
  .then((dat) => {
    console.log(dat);
  }).catch((err) => console.log(err));