import React, { Component } from "react";
import "./footer.scss";

class Footer extends Component {
    constructor() {
        super();
        this.state = {};
    }
    render() {
        return (
            <React.Fragment>
                <footer className="footer">
                    <div className="container">
                        <span className="text-muted">
                            Place sticky footer content here.
                        </span>
                    </div>
                </footer>
            </React.Fragment>
        );
    }
}

export default Footer;
