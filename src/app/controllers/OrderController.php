<?php

use Phalcon\Mvc\Controller;


class OrderController extends Controller
{
    public function indexAction()
    {
        // Redirect to View
        $sql = 'SELECT * FROM Orders';
        $query = $this->modelsManager->createQuery($sql);
        $cars = $query->execute();
        $this->view->display = "";
        foreach ($cars as $key => $value) {
            $this->view->display .= "<tr>
            <td>".$value->name."</td><td>".$value->address."</td>
            <td>".$value->zipcode."</td><td>".$value->product."</td>
            <td>".$value->quantity."</td></tr>";
        }
    }
    public function listAction()
    {
        // Redirect to View
    }
    public function addAction()
    {
        // Redirect to View
        $order = new Orders();

        $order->assign(
            $this->request->getPost(),
            [
                'name',
                'address',
                'zipcode',
                'product',
                'quantity'
            ]
        );
        $success = $order->save();
        $this->view->success = $success;
        if ($success) {
            $this->view->message = "Data Added";
        } else {
            $this->view->message = "Not Added";
        }
    }
}
