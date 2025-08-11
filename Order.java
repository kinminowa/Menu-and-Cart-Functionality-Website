public class Order {
    private int orderNumber;
    private String name;
    private String email;
    private String contact;
    private String items;
    private double total;
    private int quantity;

    public Order(int orderNumber, String name, String email, String contact,
                 String items, double total, int quantity) {
        this.orderNumber = orderNumber;
        this.name = name;
        this.email = email;
        this.contact = contact;
        this.items = items;
        this.total = total;
        this.quantity = quantity;
    }

}