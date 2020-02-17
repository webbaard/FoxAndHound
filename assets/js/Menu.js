import React from 'react';
import {ListGroup, Button} from 'react-bootstrap';
import PropTypes from 'prop-types';

export default function Menu(props) {
    const {onDelete, menu} = props;
    if (!menu.data) {
        return (<p>Loading data</p>)
    }
    if (menu.data.length <= 0) {
        return (<p>Nothing to show</p>)
    }
    return (
        <ListGroup>
            {menu.data.map(menuItem =>
                <ListGroup.Item key={menuItem.id}>
                    {menuItem.name} - {menuItem.price / 100}
                    {" "}
                    <Button className="pull-right" size="sm" variant="danger" onClick={() => onDelete(menuItem.id)}>
                        Delete
                    </Button>
                </ListGroup.Item>
            )}
        </ListGroup>
    )
}

Menu.propTypes = {
    onDelete: PropTypes.func.isRequired,
    menu: PropTypes.object.isRequired
};
