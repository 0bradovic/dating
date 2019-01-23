import React, { Component } from "react";
import "./simular-match.scss";

class SimularMatch extends Component {
    constructor() {
        super();
        this.state = {};
    }
    render() {
        return (
            <React.Fragment>
                <div className="simular_match_holder">
                    <h3>See More Like Sladja Medicinska Sestra</h3>
                    <div className="row simular_matches">
                        <div id="1" className="col-4 matches_item">
                            <a href="user-profile">
                                <img src="../images/riba.jpg" />
                            </a>
                            <div className="matches_item_desc">
                                <h3>
                                    Sladjana
                                    <span className="online_status">
                                        Online
                                        <span className="online" />
                                    </span>
                                </h3>
                                <p>
                                    Since our establishment in 2000, we have
                                    been committed to build ...
                                </p>
                            </div>
                        </div>

                        <div id="1" className="col-4 matches_item">
                            <a href="user-profile">
                                <img src="../images/riba.jpg" />
                            </a>
                            <div className="matches_item_desc">
                                <h3>
                                    Sladjana
                                    <span className="online_status">
                                        Online
                                        <span className="online" />
                                    </span>
                                </h3>
                                <p>
                                    Since our establishment in 2000, we have
                                    been committed to build ...
                                </p>
                            </div>
                        </div>

                        <div id="1" className="col-4 matches_item">
                            <a href="user-profile">
                                <img src="../images/riba.jpg" />
                            </a>
                            <div className="matches_item_desc">
                                <h3>
                                    Sladjana
                                    <span className="online_status">
                                        Online
                                        <span className="online" />
                                    </span>
                                </h3>
                                <p>
                                    Since our establishment in 2000, we have
                                    been committed to build ...
                                </p>
                            </div>
                        </div>

                        <div id="1" className="col-4 matches_item">
                            <a href="user-profile">
                                <img src="../images/riba.jpg" />
                            </a>
                            <div className="matches_item_desc">
                                <h3>
                                    Sladjana
                                    <span className="online_status">
                                        Online
                                        <span className="online" />
                                    </span>
                                </h3>
                                <p>
                                    Since our establishment in 2000, we have
                                    been committed to build ...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default SimularMatch;
