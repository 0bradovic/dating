import React, { Component } from "react";

import EmailComponent from "./emailcomponent";
import ChangePassword from "./changepassword";
import PaymentMethod from "./paymentmethod";
import "./profileSettings.scss";
import PhoneSetting from "./phonesetting";
import { API_URL, auth } from "../../../helpers";
import axios from "axios";

class Settings extends Component {
    constructor() {
        super();
        this.state = {
            my_contacts1: "0",
            repeat: "0",
            chat_requests: "0",
            oldPassword: "",
            password: "",
            password_confirmation: "",
            phoneNumber: ""
        };
        this.handleMyContactSound = this.handleMyContactSound.bind(this);
        this.handleChatRequestSound = this.handleChatRequestSound.bind(this);
        this.handleRepeatSound = this.handleRepeatSound.bind(this);
        this.oldPassword = this.oldPassword.bind(this);
        this.changePhoneNumber = this.changePhoneNumber.bind(this);
        this.newPassword = this.newPassword.bind(this);
        this.ConfirmPassword = this.ConfirmPassword.bind(this);
        this.handlerSave = this.handlerSave.bind(this);
        this.closePopup = this.closePopup.bind(this);
    }

    componentWillMount() {
        auth.get("client/settings/get").then(res => {
            console.log(res.data);
        });
    }

    handlerSave() {
        let url = API_URL + "client/settings/update";
        let auth_token = localStorage.getItem("auth_token");

        let data = {
            my_contacts: this.state.my_contacts1,
            repeat: this.state.repeat,
            chat_requests: this.state.chat_requests,
            oldPassword: this.state.oldPassword,
            password: this.state.password,
            password_confirmation: this.state.password_confirmation,
            phoneNumber: this.state.phoneNumber
        };

        auth.post("client/settings/update", data)
            .then(res => {
                console.log("Create profile response: ", res.data);
            })
            .catch(error => {
                console.log("Create profile error response: ", error.response);
            });
    }

    componentDidUpdate() {
        console.log("sounds: ", this.state.sounds);

        console.log(this.state);
        console.log("phoneNumber: ", this.state.phoneNumber);
        console.log("newPassword ", this.state.newPassword);
        console.log("my_contacts", this.state.my_contacts);
    }

    handleMyContactSound(event) {
        // let sound_list = this.state.sounds
        let check = event.target.checked;
        if ((check = true)) {
            this.setState({
                my_contacts1: "1"
            });
        } else {
            this.setState({
                my_contacts1: "0"
            });
        }
    }

    handleChatRequestSound(event) {
        // let sound_list = this.state.sounds
        let check = event.target.checked;
        if ((check = true)) {
            this.setState({
                chat_requests: "1"
            });
        } else {
            this.setState({
                chat_requests: "0"
            });
        }
    }
    handleRepeatSound(event) {
        // let sound_list = this.state.sounds
        let check = event.target.checked;
        if ((check = true)) {
            this.setState({
                repeat: "1"
            });
        } else {
            this.setState({
                repeat: "0"
            });
        }
    }

    oldPassword(pass) {
        this.setState({
            oldPassword: pass
        });
    }

    changePhoneNumber(number) {
        this.setState({
            phoneNumber: number
        });
    }
    newPassword(newpass) {
        this.setState({
            password: newpass
        });
    }
    ConfirmPassword(confirmpass) {
        this.setState({
            password_confirmation: confirmpass
        });
    }
    closePopup() {
        this.setState({
            phoneNumber: ""
        });
    }

    render() {
        return (
            <div
                className="modal fade"
                id="SettingsModal"
                tabIndex="-1"
                role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div className="modal-dialog" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="exampleModalLabel">
                                Settings
                            </h5>
                            <button
                                type="button"
                                className="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            {/* <div className="settings-form"> */}
                            {/* <span
                            className="close-settings"
                            onClick={this.props.closePopUp}
                        >
                            &#10006;
                        </span> */}
                            <div className="settings-preferences">
                                <h3>Sound</h3>
                                <form className="mycontacts">
                                    <input
                                        type="checkbox"
                                        id="mycontacts"
                                        value="mycontacts"
                                        onClick={this.handleMyContactSound}
                                    />
                                    <label forhtml="mycontacts">
                                        My Contacts
                                    </label>
                                </form>

                                <form className="chat-request">
                                    <input
                                        type="checkbox"
                                        id="chat-request"
                                        value="chat-request"
                                        onClick={this.handleChatRequestSound}
                                    />
                                    <label forhtml="chat-request">
                                        Chat Requests
                                    </label>
                                </form>

                                <form className="repeat">
                                    <input
                                        type="checkbox"
                                        id="repeat"
                                        value="repeat"
                                        onClick={this.handleRepeatSound}
                                    />
                                    <label forhtml="repeat">
                                        Repeat Until I Read
                                    </label>
                                </form>
                            </div>
                            <EmailComponent />
                            <PhoneSetting
                                changePhoneNumber={this.changePhoneNumber}
                                closePopup={this.closePopup}
                            />

                            <ChangePassword
                                newPassword={this.newPassword}
                                oldPassword={this.oldPassword}
                                ConfirmPassword={this.ConfirmPassword}
                            />
                            <PaymentMethod />
                            <div className="button-wrapper">
                                <button
                                    className="settings-save-button"
                                    onClick={this.handlerSave}
                                >
                                    save
                                </button>
                            </div>
                        </div>
                        {/* </div> */}
                        <div className="modal-footer">
                            <button
                                type="button"
                                className="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>

                            {/* <button type="button" className="btn btn-primary">Save changes</button> */}
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Settings;
