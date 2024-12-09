const icons = document.querySelectorAll(".icon");
if(icons){
  icons.forEach((icon) => {
    icon.addEventListener("click", (e) => {
      //- tìm ra dòng đưcọ ấn nút
      const currentRow = e.target.closest("tr");

      //- lay ra noi dung trn dong
      const contents = currentRow.querySelectorAll("td");
      const dataRow = {};

      contents.forEach((td, index) => {
        if (index === 0) dataRow.id = td.textContent.trim();
        if (index === 2) dataRow.product = td.textContent.trim();
        if (index === 3) dataRow.price = td.textContent.trim();
      });


      const type = icon.getAttribute("type")
      switch (type) {
        case "update":
          // Gửi dữ liệu đến server để lưu vào session
          fetch("../../../btnv/components/InputForm/update.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(dataRow), // Gửi dataRow object lên server
          })
          .then((response) => response.json()) // Chờ phản hồi từ server
          .then((data) => {
            if (data.status === 200) {
              window.location.href = "../../../btnv/components/InputForm/update.php";
            } else {
              console.error("Error:", data.message);
            }
          })
          .catch((error) => {
            console.error("Fetch error:", error);
          });
          break;

        case "delete":
          fetch("../../../btnv/actions/deleteOne.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ id: dataRow.id }),
          })
            .then((response) => response.json())
            .then((data) => {
              // console.log(data.status); // In ra id từ PHP
              if (data.status == 200){
                window.location.reload();
              }
            })
          break;
      
        default:
          break;
      }
    })
  })
}
