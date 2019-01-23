import React, { Component } from "react";

class SecondComponent extends Component {
    constructor(props) {
        super(props);

        this.detailsUpdate = this.detailsUpdate.bind(this);
    }
    detailsUpdate(details) {
        //console.log(details.target.value);
        this.props.changeDetails(details.target.value);
    }

    render() {
        return (
            <div className="details-about-you">
                <h1>Some interesting details about you</h1>
                <h4>
                    E.G.: "Hello, I'm looking for a companion. Someone with a
                    big personality but able to give me plenty of attention too.
                    Please message me if you've got a good appetite, interesting
                    conversation and the ability to laught at yourself."
                </h4>
                <textarea
                    onChange={this.detailsUpdate}
                    placeholder="Some interesting details about you"
                    value={this.props.userDetails}
                />
            </div>
        );
    }
}

export default SecondComponent;
