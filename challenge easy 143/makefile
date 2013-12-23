braille: braille.cmo
	ocamlc -o braille str.cma braille.cmo

%.cmo: %.ml
	ocamlc -c $<

test:
	./test.sh

clean:
	rm -rf braille *.cmo