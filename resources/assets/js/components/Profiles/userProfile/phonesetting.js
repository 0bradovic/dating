import React, { Component } from "react";
import PhonePopUp from "./phonepopup";


class PhoneSetting extends Component {
    constructor() {
        super();
        this.state = {
            showPopup: false
        };
    }
    
    togglePopup() {
        this.setState({
            showPopup: !this.state.showPopup
        });
    }
    render() {
        return (
            <div>
                <div className="settings-phone">
                    <h3>Calls and text messages</h3>
                    <a
                        href="#"
                        className="payment-popup-link"
                        onClick={this.togglePopup.bind(this)}
                    >
                        Add Phone Number
                    </a>
                    <p>to get calls and text messages from other members.</p>
                    {this.state.showPopup ? (
                        <PhonePopUp
                        
                            changePhoneNumber={this.props.changePhoneNumber}
                            text="Close Me"
                            closePopup={this.togglePopup.bind(this)}
                        />
                    ) : null}
                </div>
            </div>
        );
    }
}

export default PhoneSetting;
