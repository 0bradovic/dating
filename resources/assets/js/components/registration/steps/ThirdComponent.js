import React, { Component } from "react";

class ThirdComponent extends Component {
    constructor() {
        super();

        this.idealUpdate = this.idealUpdate.bind(this);
    }
    idealUpdate(ideals) {
        //console.log(ideals.target.value);
        this.props.changeIdeal(ideals.target.value);
    }

    render() {
        return (
            <div className="about-ideal-partner">
                <h1>About your ideal partner</h1>
                <textarea
                    onChange={this.idealUpdate}
                    placeholder="Few words about your ideal partner"
                    value={this.props.idealPartner}
                />
            </div>
        );
    }
}

export default ThirdComponent;
