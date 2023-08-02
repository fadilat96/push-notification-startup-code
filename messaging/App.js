import React from 'react';
import {StyleSheet, Text, View, Alert} from 'react-native';
import Expo, {Notifications} from 'expo';
import registerForNotifications from './services/push_notifications';

export default class App extends React.Component {
    componentDidMount() {
        registerForNotifications();
        Notifications.addListener((notification) => {
            const {data: {title}, origin} = notification;
            //const text = notification.data.text
            if (origin === 'received' && text) {
                Alert.alert(
                    'New Push Notification',
                    text,
                    [{text: 'Ok.'}]
                );
            }
        });
    }
    render() {
        return (
            <View style={styles.container}>
                <Text>Notifications will be received by the application</Text>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#fff',
        alignItems: 'center',
        justifyContent: 'center',
    },
});
