Set IE = CreateObject("InternetExplorer.Application")
IE.Visible = True
IE.Navigate "http://127.0.0.1:8000/add/student"

Do While IE.Busy
    WScript.Sleep 500
Loop

IE.Document.GetElementById("name").value = "alawoddin"
IE.Document.GetElementById("lastname").value = "khan"
IE.Document.GetElementById("father_name").value = "jan"
IE.Document.GetElementById("phone_number").value = "0744620492"
IE.Document.GetElementById("email").value = "dem0@gmail.com"
IE.Document.GetElementById("national_id").value = "12345"
IE.Document.GetElementById("teacher_id").value = "1"
IE.Document.GetElementById("time").value = "12345"
IE.Document.GetElementById("entry_date").value = "12345"
