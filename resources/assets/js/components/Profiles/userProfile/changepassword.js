import React, { Component } from "react";
class ChangePassword extends Component {
    constructor() {
        super();
        this.handleNewPassword = this.handleNewPassword.bind(this);
        this.handleOldPassword = this.handleOldPassword.bind(this);
        this.handleConfirmPassword = this.handleConfirmPassword.bind(this);
    }
    handleNewPassword(event) {
        this.props.newPassword(event.target.value);
    }
    handleOldPassword(pass) {
        this.props.oldPassword(pass.target.value);
    }
    handleConfirmPassword(pass) {
        this.props.ConfirmPassword(pass.target.value);
    }
    render() {
        return (
            <div className="setttings-password">
                <h3>Change your password</h3>
                <p>
                    Remember to change your password to something you won't
                    forget and other people won't be able to guess.
                </p>
                <label>Type active password</label>
                <input
                    type="password"
                    className="password-area"
                    onChange={this.handleOldPassword}
                    name="password"
                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                />
                <label>Type new password</label>
                <input
                    type="password"
                    className="password-area"
                    onChange={this.handleNewPassword}
                    name="password"
                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                />
                <label>Re-type new password</label>
                <input
                    type="password"
                    className="password-area"
                    onChange={this.handleConfirmPassword}
                    name="password"
                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                />
            </div>
        );
    }
}

export default ChangePassword;
