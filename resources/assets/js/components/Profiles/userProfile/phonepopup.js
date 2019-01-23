import React, { Component } from "react";

class PhonePopUp extends Component {
    constructor() {
        super();

        this.handlePhone = this.handlePhone.bind(this);
    }
    handlePhone(event) {
        this.props.changePhoneNumber(event.target.value);
    }

    render() {
        return (
            <div className="phone-popup">
                <div className="popup_inner">
                    <span onClick={this.props.closePopup}>&#10006;</span>
                    <h1>Your Phone Number</h1>
                    <p>
                        Get text notification, calls, updates and more from
                        dating.com. Your phone number will only be visible to
                        you.
                    </p>
                    <input
                        type="number"
                        name="phonenumber"
                        min="1"
                        max="15"
                        onChange={this.handlePhone}
                        placeholder="Mobile Phone Number"
                        className="phonenumber-area"
                    />
                    <p className="confirm-number">
                        You will receive a text message confirming your number
                    </p>
                    <div className="button-container">
                        <button onClick={this.props.closePopup} className="btn-phone-confirm">Confirm</button>
                    </div>
                </div>
            </div>
        );
    }
}

export default PhonePopUp;
