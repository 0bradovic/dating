import React, { Component } from "react";

class ShoppingBasket extends Component {
    constructor(props) {
        super(props);
    }
    countReset() {
        this.state.counter;
    }

    render() {
        return (
            <div className="basket">
                <div className="basket-awesome">
                    <i class="fas fa-shopping-cart" />
                </div>
                <button
                    className="btn btn-primary btn-sm reset"
                    onClick={this.props.countReset}
                >
                    Resert
                </button>
            </div>
        );
    }
}

export default ShoppingBasket;
