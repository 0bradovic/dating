import React, { Component } from "react";
import Shopping from "./shopping";
import ShoppingBasket from "./shoppingbasket";

class ShoppingCarts extends Component {
    constructor(props) {
        super(props);
        this.state = {
            items: [
                { id: 1, value: 1 },
                { id: 2, value: 4 },
                { id: 3, value: 1 },
                { id: 4, value: 0 },
                { id: 7, value: 4 },
                { id: 8, value: 0 },
                { id: 9, value: 4 },
                { id: 10, value: 6 },
                { id: 11, value: 0 },
                { id: 12, value: 0 },
                { id: 13, value: 4 },
                { id: 14, value: 0 },
                { id: 15, value: 0 },
                { id: 16, value: 5 },
                { id: 17, value: 0 },
                { id: 18, value: 0 },
                { id: 19, value: 6 },
                { id: 20, value: 2 },
                { id: 21, value: 5 },
                { id: 22, value: 5 }
            ]
        };
        // this.deleteItem = this.deleteItem.bind(this);
        // this.countReset = this.countReset.bind(this);
    }

    render() {
        return (
            <div className="shopping-items">
                {this.state.items.map(item => (
                    <Shopping key={item.id} value={item.value} id={item.id} />
                ))}
                <ShoppingBasket
                // countReset={this.countReset}
                />
            </div>
        );
    }
}

export default ShoppingCarts;
