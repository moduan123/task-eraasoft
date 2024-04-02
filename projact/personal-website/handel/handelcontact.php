<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // // Extracting form data
    // $name = $_POST["name"] ?? '';
    // $email = $_POST["email"] ?? '';
    // $message = $_POST["message"] ?? '';

    // // Format data
    // $data = "Name: $name\nEmail: $email\nMessage: $message\n\n";

    // // File path
    // $file_path = "../users.txt";

    // // Save data to file
    // if (file_put_contents($file_path, $data, FILE_APPEND | LOCK_EX) !== false) {
    //     echo "Data has been saved successfully.";
    // } else {
    //     echo "Error occurred while saving data.";
    // }

    // قم بفتح ملف للكتابة
    $file = fopen("../users.txt", "a"); // "a" يعني فتح الملف للإضافة إلى نهايته

    // تأكد من أن الملف تم فتحه بنجاح قبل الاستمرار
    if ($file === false) {
        die("Unable to open file");
    }
    // تنظيف وتنسيق البيانات المدخلة من النموذج
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);


    // كتابة البيانات إلى الملف
    fwrite($file, "Name: $name\n");
    fwrite($file, "Email: $email\n");
    fwrite($file, "phone: $phone\n");
    fwrite($file, "Message: $message\n\n");

    // إغلاق الملف بمجرد الانتهاء من الكتابة
    fclose($file);

    // رسالة بأن البيانات تم حفظها بنجاح
    echo "Data has been saved successfully.";
}
?>