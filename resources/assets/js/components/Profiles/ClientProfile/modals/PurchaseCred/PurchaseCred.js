import React, { Component } from "react";

import Slider from "react-rangeslider";
import "react-rangeslider/lib/index.css";
import "./purchase-cred.scss";

class PurchaseCred extends Component {
    constructor() {
        super();
        this.state = {
            value: 10
        };

        this.handleChange = this.handleChange.bind(this);
    }

    // Credits Range Slider
    handleChangeStart() {
        console.log("Change event started");
    }

    handleChange(value) {
        this.setState({
            value: value
        });
    }

    handleChangeComplete() {
        console.log("Change event completed");
    }
    // End Credits Range Slider
    render() {
        const { value } = this.state;
        return (
            <React.Fragment>
                <div
                    className="modal fade"
                    tabIndex="-1"
                    role="dialog"
                    id="purchaseCred"
                >
                    <div
                        className="modal-dialog purchase_creds_modal"
                        role="document"
                    >
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title">
                                    Purchase Credits & Get Amazing Features for
                                    only <span>$0.10 per Credit*</span>
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
                                <p className="creds_purchase_description">
                                    Live Chat — 1 Credit per minute, Offline
                                    message — 1 Credit, Email — 10 Credits.
                                </p>
                                <p className="title_choose_cred col-12">
                                    Choose number of Credits:
                                </p>
                                <div className="slider_range col-12">
                                    <Slider
                                        min={0}
                                        max={100}
                                        value={value}
                                        onChangeStart={this.handleChangeStart}
                                        onChange={this.handleChange}
                                        onChangeComplete={
                                            this.handleChangeComplete
                                        }
                                    />
                                    <div className="value">{value}</div>
                                </div>

                                {/* Credit Card Parameters */}
                                <div className="container">
                                    <form
                                        className="form-horizontal"
                                        role="form"
                                    >
                                        <fieldset>
                                            <div className="col-12">
                                                <legend>Payment Details</legend>
                                            </div>
                                            <div className="form-group">
                                                <label
                                                    className="col-sm-3 control-label"
                                                    htmlFor="card-holder-name"
                                                >
                                                    Name on Card
                                                </label>
                                                <div className="col-sm-9">
                                                    <input
                                                        type="text"
                                                        className="form-control"
                                                        name="card-holder-name"
                                                        id="card-holder-name"
                                                        placeholder="Card Holder's Name"
                                                    />
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label
                                                    className="col-sm-3 control-label"
                                                    htmlFor="card-number"
                                                >
                                                    Card Number
                                                </label>
                                                <div className="col-sm-9">
                                                    <input
                                                        type="text"
                                                        className="form-control"
                                                        name="card-number"
                                                        id="card-number"
                                                        placeholder="Debit/Credit Card Number"
                                                    />
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label
                                                    className="col-sm-3 control-label "
                                                    htmlFor="expiry-month"
                                                >
                                                    Expiration Date
                                                </label>
                                                <div className="col-sm-9">
                                                    <div className="row">
                                                        <div className="col-4">
                                                            <select
                                                                className="form-control col-sm-2 experition_date"
                                                                name="expiry-month"
                                                                id="expiry-month"
                                                            >
                                                                <option>
                                                                    Month
                                                                </option>
                                                                <option value="01">
                                                                    Jan (01)
                                                                </option>
                                                                <option value="02">
                                                                    Feb (02)
                                                                </option>
                                                                <option value="03">
                                                                    Mar (03)
                                                                </option>
                                                                <option value="04">
                                                                    Apr (04)
                                                                </option>
                                                                <option value="05">
                                                                    May (05)
                                                                </option>
                                                                <option value="06">
                                                                    June (06)
                                                                </option>
                                                                <option value="07">
                                                                    July (07)
                                                                </option>
                                                                <option value="08">
                                                                    Aug (08)
                                                                </option>
                                                                <option value="09">
                                                                    Sep (09)
                                                                </option>
                                                                <option value="10">
                                                                    Oct (10)
                                                                </option>
                                                                <option value="11">
                                                                    Nov (11)
                                                                </option>
                                                                <option value="12">
                                                                    Dec (12)
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div className="col-4">
                                                            <select
                                                                className="form-control"
                                                                name="expiry-year"
                                                            >
                                                                <option value="13">
                                                                    2013
                                                                </option>
                                                                <option value="14">
                                                                    2014
                                                                </option>
                                                                <option value="15">
                                                                    2015
                                                                </option>
                                                                <option value="16">
                                                                    2016
                                                                </option>
                                                                <option value="17">
                                                                    2017
                                                                </option>
                                                                <option value="18">
                                                                    2018
                                                                </option>
                                                                <option value="19">
                                                                    2019
                                                                </option>
                                                                <option value="20">
                                                                    2020
                                                                </option>
                                                                <option value="21">
                                                                    2021
                                                                </option>
                                                                <option value="22">
                                                                    2022
                                                                </option>
                                                                <option value="23">
                                                                    2023
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label
                                                    className="col-sm-3 control-label"
                                                    htmlFor="cvv"
                                                >
                                                    Card CVV
                                                </label>
                                                <div className="col-sm-3">
                                                    <input
                                                        type="text"
                                                        className="form-control"
                                                        name="cvv"
                                                        id="cvv"
                                                        placeholder="Security Code"
                                                    />
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                {/* End Credit Card Parameters */}
                            </div>
                            <div className="modal-footer">
                                <button
                                    type="button"
                                    className="btn btn-success"
                                >
                                    Pay Now
                                </button>
                                <button
                                    type="button"
                                    className="btn btn-secondary"
                                    data-dismiss="modal"
                                >
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default PurchaseCred;
