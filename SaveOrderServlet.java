@WebServlet("/saveOrder")
public class SaveOrderServlet extends HttpServlet {
    private List<Order> orderList = new ArrayList<>();

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
        throws ServletException, IOException {

        String name = request.getParameter("name");
        String email = request.getParameter("email");
        String contact = request.getParameter("contact");
        String items = request.getParameter("order_items");
        double total = Double.parseDouble(request.getParameter("total"));
        int quantity = Integer.parseInt(request.getParameter("quantity"));
        int orderNumber = Integer.parseInt(request.getParameter("order_number"));

        Order order = new Order(orderNumber, name, email, contact, items, total, quantity);
        orderList.add(order);

        response.setContentType("text/plain");
        response.getWriter().write("Order saved successfully! Order No: " + orderNumber);
    }
}
