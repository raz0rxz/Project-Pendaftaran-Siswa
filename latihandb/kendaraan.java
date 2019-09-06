package inheritance;

public class kendaraan {
	int roda;
	void jenis(int roda) {
		this.roda = roda;
			if (roda==2){
				System.out.println("Kendaraan anda motor");
			}
			else if (roda==4) {
				System.out.println("Kendaraan anda mobil");
			}
			else System.out.println("Data tidak ada, kereta kah?:v");
		String getroda() {
			return roda;
		}
	}
}