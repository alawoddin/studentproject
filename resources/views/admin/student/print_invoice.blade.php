<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Bill Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      @media print {
        @page {
          size: A6;
          margin: 20mm;
        }
      }

      body {
        font-family: Arial, sans-serif;
        padding: 30px;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 30px;
      }

      .invoice-box {
        width: 700px;
        margin: auto;
        border: 1px solid #ddd;
        padding: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }

      .bill-header {
        width: 100%;
        height: 130px;
        background-color: rgb(16, 94, 16);
        position: relative;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        padding: 10px;
      }

      .header-logo {
        height: 90px;
        width: 100px;
        border-radius: 50%;
      }

      .header-text {
        width: 50%;
        height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        /* background-color: red; */
      }

      .header-text .tst-h1 {
        font-size: 18px;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
          sans-serif;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 900;
        color: #fff;
      }

      .tst-p1,
      .tst-p2,
      .tst-p3 {
        font-size: 10px;
        color: #fff;
        letter-spacing: 0.5px;
      }

      .header-id {
        width: 33%;
        /* background-color: blue; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
      }

      .header-id .id-title {
        font-size: 18px;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
          sans-serif;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 900;
        color: #fff;
      }

      .header-id .id-num {
        width: 60%;
        line-height: 2.5;
        /* height: 50px; */
        background-color: rgba(17, 210, 17, 0.27);
        text-align: center;
        font-size: 15px;
        font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
          sans-serif;
        letter-spacing: 1px;
        /* text-transform: uppercase; */
        font-weight: 900;
        color: #fff;
      }
      /* ---------------------------------------- bill body------------------------------------------  */

      .bill-body {
        width: 100%;
        height: 300px;
        background-color: rgba(243, 242, 242, 0.864);
        position: relative;
        background-image: url({{asset('backend/back.jpg')}});
        background-position: center;
        background-size: cover;
      }
      .form {
        width: 100%;
        height: 50%;
        /* background-color: red; */
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
      }
      form {
        width: auto;
        height: 50%;
        padding: 0 15px;
        /* background-color: rgb(52, 7, 230); */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
      }

      label {
        font-size: 12px;
        letter-spacing: 0.5px;
        font-family: sans-serif;
        font-weight: bold;
        color: rgb(51, 99, 39);
        padding: 0 5px;
        /* margin-bottom: -20px; */
      }

      input {
        width: 23%;
        background-color: transparent;
        border: none;
        outline: none;
        border-bottom: 1px solid rgb(51, 99, 39);
        text-align: center;
        font-style: bold;
      }
      .footer {
        width: 100%;
        height: 50%;
        /* background-color: red; */
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 20px;
        padding-right: 10px;
      }

      .footer-paid {
        width: 40%;
        height: auto;
        /* background-color: silver; */
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: start;
        gap: 5px;
      }
      .footer-paid table {
        border-collapse: collapse;
        /* border: 10px solid #tr; */
        /* background-color: silver; */

        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: start;
        gap: 10px;
      }
      th {
        border: 8px solid rgb(243, 242, 242);
        background-color: green;
        padding: 2px 5px;
        color: #fff;
        font-size: 15px;
        text-align: center;
      }

      td {
        border: 8px solid rgb(243, 242, 242);
        background-color: green;
        padding: 2px 7px;
        width: 130px;
        color: #fff;
        text-align: center;
        font-size: 15px;
      }

      .footer-receive {
        width: 30%;
        height: auto;
        /* background-color: #fff; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 50px;
        padding-bottom: 10px;
        margin-left: -30px;
      }

      #qrcode {
        width: auto;
        padding: 2px;
        border: 3px solid green;
      }

      button {
        margin: auto;
        padding: 10px 20px;
        font-size: 16px;
        background: #1a7032;
        color: white;
        border: none;
        border-radius: 20px;
        cursor: pointer;
      }
      /* ---------------------------------------- bill body------------------------------------------  */
    </style>
  </head>
  <body >
    <div class="invoice-box" id="bill">
      <div class="bill-header">
        <img src="{{asset('backend/logo.png')}}" alt="logo" class="header-logo" />
        <div class="header-text">
          <span class="tst-h1">tawana technology</span>
          <span class="tst-p1"
            ><i class="fa-solid fa-location-dot"></i> Kabul, Pul-e-Surkh
            intersection, Amir Business</span
          >
          <span class="tst-p2"
            ><i class="fa-solid fa-globe"></i> tawanatechnology.com</span
          >
          <span class="tst-p3"
            ><i class="fa-solid fa-phone-volume"></i> Tel,
            +93-078-8077-685</span
          >
        </div>
        <div class="header-id">
          <span class="id-title">Bill No</span>
          <div class="id-num">#{{$Paid->id}}</div>
        </div>
      </div>
      <div class="bill-body">
        <div class="form">
          <form action="">
            <div class="form-bx1">
              <label for="">Name </label>
              <input type="text" id="" name="" value="{{ $Paid->student->name }}" style="width: 25%" readonly />
              <label for="">F/Name </label>
              <input type="text" id="" name="" value="{{ $Paid->student->father_name }}" readonly  />
              <label for="">Last name </label>
              <input type="text" id="" name="" value="{{ $Paid->student->lastname }}" style="width: 22%"readonly  />
            </div>
            <div class="form-bx1">
              <label for="">Subject </label>
              <input type="text" id="" name="" value="{{ $Paid->subject->subject_name }}" readonly />
              <label for="">Amount </label>
              <input type="text" id="" name="" value="{{ $Paid->total_fees }}" style="width: 22%" readonly />
              <label for="">Time </label>
              <input type="text" id="" name="" value="{{ \Carbon\Carbon::parse($Paid->student->time)->format('h:i A') }}" style="width: 27%" readonly />
            </div>
          </form>
        </div>
        <div class="footer">
          <div class="footer-paid">
            <table>
              <tr>
                <th>Paid Fee</th>
                <td>{{ $Paid->paid }}</td>
              </tr>
              <tr>
                <th>Remain Fee</th>
                <td>{{ $Paid->remaining_Fees }}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td>{{ $Paid->paid_date }}</td>
              </tr>
            </table>
          </div>
          <div class="footer-receive">
            <label for="" style="font-size: 16px">Received By</label>
            <input
              type="text"
              id=""
              name=""
              value=""
              style="border-bottom: 0px; width: 70%"
            />
          </div>
          <div id="qrcode"></div>
        </div>
      </div>
    </div>
    <script>
      // Generate the QR Code
      new QRCode(document.getElementById("qrcode"), {
        text: "https://www.facebook.com/ECDI1?mibextid=LQQJ4d", // replace with your URL
        width: 90,
        height: 90,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H,
      });
    </script>
    <!-- certificate -->
    <button onclick="downloadPDF()">📄 Download PDF</button>

    <script>
      async function downloadPDF() {
        const { jsPDF } = window.jspdf;
        const element = document.getElementById("bill");

        // اسکرین‌شات از عنصر
        const canvas = await html2canvas(element, { scale: 2 });
        const imgData = canvas.toDataURL("image/png");

        // ایجاد PDF
        const pdf = new jsPDF("landscape", "mm", "a6");
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();

        pdf.addImage(imgData, "PNG", 0, 0, pageWidth, pageHeight);
        pdf.save("Bill.pdf");
      }
    </script>
  </body>
</html>
