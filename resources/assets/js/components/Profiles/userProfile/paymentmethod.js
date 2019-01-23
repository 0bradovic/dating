import React, { Component } from "react";
import PaymentPopUp from "./paymenthpopup";

class PaymenthMethod extends Component {
    constructor() {
        super();
        this.state = {
            showPopup: false,
            visible: false
        };
    }
    show() {
        this.setState({ visible: true });
    }

    hide() {
        this.setState({ visible: false });
    }

    togglePopup() {
        this.setState({
            showPopup: !this.state.showPopup
        });
    }
    render() {
        return (
            <div className="settings-payment">
                
                <h3>Payment settings</h3>
                <p>
                    The Automatic Purchasing setting is not currently available
                    as your last purchase has not been successful. Please
                    attempt your purchase manually on the{" "}
                    <a
                        href="#"
                        className="payment-popup-link"
                        onClick={this.show.bind(this)}
                    >
                        Purchase Form
                    </a>{" "}
                    to return the setting.
                </p>
               
            </div>
        );
    }
}

export default PaymenthMethod;
