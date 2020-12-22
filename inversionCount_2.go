package main

import (
	"fmt"
	"io/ioutil"
	"strconv"
	"strings"
)

func inversionCount(arr []int) int {
	count := 0
	for i := range arr {
		for j := i+1; j < len(arr); j++ {
			if arr[i] > arr[j] {
				count++
			}
		}
	}
	return count
}

func main() {
	fileContent, err := ioutil.ReadFile("IntegerArray.txt")
	if err != nil {
		panic(err)
	}
	stringArray := strings.Fields(string(fileContent))
	intArray := []int{}
	for _, v := range stringArray {
		intVal, err := strconv.Atoi(v)
		if err != nil {
			panic(err)
		}
		intArray = append(intArray, intVal)
	}
	fmt.Println(inversionCount(intArray))
}
