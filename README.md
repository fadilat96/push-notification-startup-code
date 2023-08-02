# push-notification-startup-code
This react native sample that i made show how to send expo push notification with mysql php backend connected to it.

1)Create MySqlDatabase in phpmyadmin and create the table users by executing the following command:
```sql
CREATE TABLE `users` (
  `Token` varchar(700) NOT NULL
)
```

2) Put the php files located in folder expo_push_notification_backend on your server and Edit your php files appropriately and make sure to edit the connection to your specific database and the table in it

3)Open the 'messaging' expo project in your favorite text editor and open it in cmd or terminal and run npm install to install all node_modules

4) the push notification services is located in ```/services/push_notification.js```
Open it and change the location specific to your web server url and call the file
```javascript
let token = await Notifications.getExpoPushTokenAsync();
await axios.get('http://192.168.1.70/expo_push_notification_backend/register_for_push_notification.php?token='+token)
.then(function (response) {
console.log(response);
})
.catch(function (error) {
console.log(error);
});
```

5)Run the application on your ios or android device

6) to test the push notification just call the file ```expo_push_notification.php``` from your web server and a notification will be sent to all registered devices

the app works too when you deploy it using exp build:ios for ios or exp build:android for android



