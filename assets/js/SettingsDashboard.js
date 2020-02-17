import React, {Component} from 'react';
import Menu from './Menu';
import AddMenuItemForm from "./AddMenuItemForm";
import axios from "axios/index";

export default class SettingsDashboard extends Component {

    constructor(props) {
        super(props);
        this.state = {
            menu: {}
        };

        this.onNewMenuItemSubmit = this.onNewMenuItemSubmit.bind(this);
        this.onRemoveMenuItem = this.onRemoveMenuItem.bind(this);

    }

    componentDidMount() {
        this.getMenuData();
    }

    getMenuData() {
        axios.get('/menu/list.json').then(response => {
            this.setState({menu: response})
        })
    }

    async onNewMenuItemSubmit(name, price) {
        await axios.post('/api/commands/add-menu-item', JSON.stringify({
            'name' : name,
            'price': price
        }));
        this.getMenuData();
    }

    async onRemoveMenuItem(id) {
        await axios.post('/api/commands/remove-menu-item', JSON.stringify({
            'id' : id
        }));
        this.getMenuData();
    }

    render() {
        const { menu } = this.state;
        return (<div className="row">
            <div className="col-lg-6">
                <div className="row">
                    <div className="col-lg-8 order-first order-lg-first order-sm-last">
                        <Menu
                            menu={menu}
                            onDelete={this.onRemoveMenuItem}
                        />
                    </div>
                    <div className="col-lg-4 order-last order-lg-last order-sm-first">
                        <AddMenuItemForm
                            onNewMenuItemSubmit={this.onNewMenuItemSubmit}
                        />
                    </div>
                </div>
            </div>
        </div>)
    }
}